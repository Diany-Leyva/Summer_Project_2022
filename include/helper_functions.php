<?php

// --------------------------------------------------------------------------

function debug($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

// --------------------------------------------------------------------------

function space(){
    echo"
    <br></br>
    ";
}

// --------------------------------------------------------------------------

function formatDate($date, $format) {
    $newDateFormat = $date;
    $newDateFormat = new DateTime($newDateFormat);
    $newDateFormat = $newDateFormat->format($format);
    return $newDateFormat;
}

// --------------------------------------------------------------------------
//This function accepts allStudent array as reference and adds to the array 
//the remaining "credits" the student have 
// --------------------------------------------------------------------------
function addRemainingCredits(&$allStudents){                                             
      
    $creditsAmount = getCreditsAmount();                                              //Gets the amount of credit the students have from the credits table
    $classesAmount = getClassesAmount();                                              //Same with classes amount

    $studentIdsArray = array_column($classesAmount, 'Student_Id');                   //Gets an array of studentsId from the classes array because is the easiest way I found to search for specific studentId.
  
    $i = 0;
    foreach($creditsAmount as $credit){                                              //Go throught the creditsAmount array and
        if (in_array($creditsAmount[$i]['Student_Id'], $studentIdsArray)){           //branch if the studentsId from the credits array is found in the classes array. I do this because 
                                                                                     //I want to loop throught that array only if I know the student id is there. I wonder if there is a built in function that returns it
            foreach($classesAmount as $class){                                    
                if($class['Student_Id'] == $creditsAmount[$i]['Student_Id'] ){       //when the studentsId is found
                    $creditsAmount[$i]['Credits_Amount'] = $creditsAmount[$i]['Credits_Amount'] - $class['Classes_Amount'];         //update the remaining credits amount by subtracting the classes the students has booked 
                }
            }   
        }

        $i++;
    }
                                                                                      //Now that the calculation of the remaining credits was made
    $studentsWithCredits = array_column($creditsAmount, 'Student_Id');                 //Get an array of studentsId from the credits array because it will be used to see if the specidifc student is in the array
    
    $i = 0;
    foreach($allStudents as $student){

        $allStudents[$i]['Credits']='0';                                               //add a key "credits" to each student and initialize it to 0

        if (in_array($allStudents[$i]['Student_Id'], $studentsWithCredits)){           //branch if the current student id is in the credits array

            foreach($creditsAmount as $credit){                                        //if branched, loop throught the arrays of credits
                if($credit['Student_Id'] == $allStudents[$i]['Student_Id'] ){          //when the ids are equal
                    $allStudents[$i]['Credits'] = $credit['Credits_Amount'];           //update the credits amount (originally 0) with the correct amount. Those without credits will stay at 0
                }
            }       
        }
    
        $i++;
    }    

//I'm doing all of these because there are students with no credits so they are no in 
//the credits table. My strategy here is to add a credits key to the students array with 0 credits
//and then update the credits amount. This is the remaining credits they have (not the total of credits) 
//so I'm subtracting the total credits to the total classes they have to get the 
//remaining credits and then update that in the student array
}

// --------------------------------------------------------------------------
//The strategy for classes in this function is very similar to what I did with credits. 
//I think I will combine these into one and just pass the correct parameters 
// --------------------------------------------------------------------------

function addFutureClassesAmount(&$allStudents){
    $futureClassesAmount = getFutureClassesAmount();                                       
    $studentIdsArray = array_column($futureClassesAmount, 'Student_Id');                   

    $i = 0;
    foreach($allStudents as $student){
    
        $allStudents[$i]['Classes']='0';                                                   
    
        if (in_array($allStudents[$i]['Student_Id'], $studentIdsArray)){                 
    
            foreach($futureClassesAmount as $futureClass){                                
                if($futureClass['Student_Id'] == $allStudents[$i]['Student_Id'] ){         
                    $allStudents[$i]['Classes'] = $futureClass['Classes_Pending'];        
                }
            }       
        }
       
        $i++;
    }
}

// --------------------------------------------------------------------------
//Same strategy but slight differences at the end
// --------------------------------------------------------------------------

function addDaysToNextClass(&$allStudents){
    $allFutureClasses = getFutureClasses();                                                     //Gets all the classes that are scheduled 
    $nextClasses= removeDuplicateMultiDArray($allFutureClasses, 'Student_Id');                  //I'm removing the duplicated studentId because the query above returns all the future classes, so 
                                                                                                //there could be a student with several future classes, so this function will ensure there is only one class 
                                                                                                //per student in the array which will be the next class because the query is ordered by date                        
    $studentIdsArray = array_column($nextClasses, 'Student_Id');                                 
    $today = new DATETIME(currentDate());                                                       //Today will be used to perform the calculation with the class date

    $i = 0;
    foreach($allStudents as $student){
    
        $allStudents[$i]['DaysToNextClass']['Months']='0';                                      //add a DaysToNextClass key that will have days and months initialized to 0
        $allStudents[$i]['DaysToNextClass']['Days']='0';
    
        if(in_array($allStudents[$i]['Student_Id'], $studentIdsArray)){                         //branch if the current student id is in the classes array
    
            foreach($nextClasses as $nextClass){
                if($nextClass['Student_Id'] == $allStudents[$i]['Student_Id']){                 //when the ids are equal
                    $classDate = new DATETIME($nextClass['Date']);                              //When performing the calculations with date (see getDayDifference function) I had to use
                                                                                                //new DATETIME to be able to use diff()
                    $allStudents[$i]['DaysToNextClass'] = getDayDifference($classDate, $today); //perform the calculation 
                }                                   
            }       
        }
    
        $i++;
    }     
}

// --------------------------------------------------------------------------

function removeDuplicateMultiDArray($array, $key) {                                                                
    $temp_array = [];  
    $i = 0; 
    $key_array = []; 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) {                                                                      
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}

// --------------------------------------------------------------------------

function getDayDifference($futureDate, $today){ 
    $difference = $futureDate->diff($today);
    $date = [];                                                                                              //I wonder if I should out the year too just in case
    $date['Months'] = $difference->format('%m');
    $date['Days'] = $difference->format('%d');    
    return $date;
}

// --------------------------------------------------------------------------

function calcStudentRemainingCredits($studentId){
    $remainingCredits = [];  
    $remainingCredits = getStudentCreditAmount($studentId);
  
    (!$remainingCredits)? $remainingCredits = '0': $remainingCredits = getStudentCreditAmount($studentId)['Credits_Amount'] - getStudentClassesAmount($studentId)['Classes_Amount'];
    
    return $remainingCredits;
}

// --------------------------------------------------------------------------

function currentDate(){
    date_default_timezone_set("America/Chicago");
    return date("Y/m/d h:i:s");
}

// --------------------------------------------------------------------------

function calculateTotalClasses($classesThisMonth, $classesThisYear){
    $monthAmount= $yearAmount = [];
    
    (!$classesThisMonth)? $monthAmount = 0 : $monthAmount = $classesThisMonth['Amount'];
    (!$classesThisYear)? $yearAmount = 0 : $yearAmount = $classesThisYear['Amount'];

    return [
        'MonthTotal' => $monthAmount,
        'YearTotal' => $yearAmount        
    ];
}
// --------------------------------------------------------------------------


