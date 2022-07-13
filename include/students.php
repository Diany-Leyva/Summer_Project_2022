<?php

// --------------------------------------------------------------------------
//This function accepts allStudent array as reference and adds to the array 
//the remaining "credits" the student have 
// --------------------------------------------------------------------------

function addRemainingCredits(&$allStudents){                                          
      
    $creditsAmount = getCreditsAmount();                                              //Gets the amount of credit the students have from the credits table
    $classesAmount = getClassesAmount();                                              //Same with classes amount

    $studentsWithClassesArray = array_column($classesAmount, 'StudentId');                   //Gets an array of studentsId from the classes array because is the easiest way I found to search for specific studentId.
  
    $i = 0;
    foreach($creditsAmount as $credit){                                              //Go throught the creditsAmount array and
        if (in_array($creditsAmount[$i]['StudentId'], $studentsWithClassesArray)){           //branch if the studentsId from the credits array is found in the classes array. I do this because 
                                                                                     //I want to loop throught that array only if I know the student id is there. I wonder if there is a built in function that returns it
            foreach($classesAmount as $class){                                    
                if($class['StudentId'] == $creditsAmount[$i]['StudentId'] ){       //when the studentsId is found
                    $creditsAmount[$i]['CreditsAmount'] = $creditsAmount[$i]['CreditsAmount'] - $class['ClassesAmount'];         //update the remaining credits amount by subtracting the classes the students has booked 
                }
            }   
        }

        $i++;
    }
                                                                                      //Now that the calculation of the remaining credits was made
    $studentsWithCredits = array_column($creditsAmount, 'StudentId');                 //Get an array of studentsId from the credits array because it will be used to see if the specidifc student is in the array
    
    $i = 0;
    foreach($allStudents as $student){

        $allStudents[$i]['Credits']='0';                                               //add a key "credits" to each student and initialize it to 0

        if (in_array($allStudents[$i]['StudentId'], $studentsWithCredits)){           //branch if the current student id is in the credits array

            foreach($creditsAmount as $credit){                                        //if branched, loop throught the arrays of credits
                if($credit['StudentId'] == $allStudents[$i]['StudentId'] ){          //when the ids are equal
                    $allStudents[$i]['Credits'] = $credit['CreditsAmount'];           //update the credits amount (originally 0) with the correct amount. Those without credits will stay at 0
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
    $studentIdsArray = array_column($futureClassesAmount, 'StudentId');                   

    $i = 0;
    foreach($allStudents as $student){
    
        $allStudents[$i]['Classes']='0';                                                   
    
        if (in_array($allStudents[$i]['StudentId'], $studentIdsArray)){                 
    
            foreach($futureClassesAmount as $futureClass){                                
                if($futureClass['StudentId'] == $allStudents[$i]['StudentId'] ){         
                    $allStudents[$i]['Classes'] = $futureClass['ClassesPending'];        
                }
            }       
        }
       
        $i++;
    }
}

// --------------------------------------------------------------------------
//Same strategy but slightly different at the end
// --------------------------------------------------------------------------

function addDaysToNextClass(&$allStudents){
    $allFutureClasses = getFutureClasses();                                                     //Gets all the classes that are scheduled 
    $nextClasses= removeDuplicateMultiDArray($allFutureClasses, 'StudentId');                   //I'm removing the duplicated studentId (the whole element, not only the id) 
                                                                                                //because the query above returns all the future classes of each student. So there could be a student 
                                                                                                //with several future classes (which means if a student has 3 future classes, there will be 3 array 
                                                                                                //elements with the same studentId and just different class information). So this function removes the "duplicates" 
                                                                                                //(perhaps I should name it differently). o consider any element with the same studentId to be a duplicate. 
                                                                                                //In the end, it leaves only one row per student, which will be the next class, since the query is ordered by date.   
    $studentIdsArray = array_column($nextClasses, 'StudentId');                                 
    $today = new DATETIME(date("Y/m/d h:i:s"));                                                //Today will be used to perform the calculation with the class date
  
    $i = 0;
    foreach($allStudents as $student){
    
        $allStudents[$i]['DaysToNextClass']['Months']='0';                                      //add a DaysToNextClass key that will have days and months initialized to 0
        $allStudents[$i]['DaysToNextClass']['Days']='0';
    
        if(in_array($allStudents[$i]['StudentId'], $studentIdsArray)){                         //branch if the current student id is in the classes array
    
            foreach($nextClasses as $nextClass){
                if($nextClass['StudentId'] == $allStudents[$i]['StudentId']){                 //when the ids are equal
                    $classDate = new DATETIME($nextClass['StartDate']);                              //When performing the calculations with date (see getDayDifference function) I had to use
                                                                                                //new DATETIME to be able to use diff()
                    $allStudents[$i]['DaysToNextClass'] = getDayDifference($classDate, $today); //perform the calculation 
                }                                   
            }       
        }
    
        $i++;
    }     
}


// --------------------------------------------------------------------------
//This function gets the amount of credits a students has. If the query returns 
//false assign 0 credits otherwise subtract the amount of classes the student 
//has from the amount of credits to get the remaining credits
// --------------------------------------------------------------------------

function calcStudentRemainingCredits($studentId){
    $remainingCredits = [];  
    $remainingCredits = getStudentCreditAmount($studentId);                                                  //gets the amount of credits the students has
  
    (!$remainingCredits)? $remainingCredits = '0': $remainingCredits = $remainingCredits['CreditsAmount'] - getStudentClassesAmount($studentId)['ClassesAmount'];
    
    return $remainingCredits; 
}

// --------------------------------------------------------------------------
//This function calculates the total classes a students has in the current month
//and year. 
// --------------------------------------------------------------------------

function calculateTotalClasses($studentId){
    $classesThisMonth = getStudentClassesAmountThisMonth($studentId);
    $classesThisYear = getStudentClassesAmountThisYear($studentId);

    $monthAmount= $yearAmount = [];
    
    (!$classesThisMonth)? $monthAmount = 0 : $monthAmount = $classesThisMonth['Amount'];
    (!$classesThisYear)? $yearAmount = 0 : $yearAmount = $classesThisYear['Amount'];

    return [
        'MonthTotal' => $monthAmount,
        'YearTotal' => $yearAmount        
    ];
}
// --------------------------------------------------------------------------
