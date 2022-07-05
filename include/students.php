<?php

// --------------------------------------------------------------------------
//This function calculates the remaining credits each student has (all at once)
//considering the refunds and also the classes booked.
// --------------------------------------------------------------------------


function calcRemainingCredits(){
    $creditsAmount = getCreditsAmount();                                              
    $classesAmount = getClassesAmount();                                              
    $refundsAmount = getRefundsAmount();                

    //Do the calculation based on the refunds the students have. Each student 
    //has a certain amount of credits in the table, but I need to consider wheter
    //a refund was made, and if so I need to subtract that from the orginal amount

    $creditsAmount = updateCreditsAmountArray($creditsAmount, $refundsAmount, 'RefundAmount');                                

    //Noe we need to consider if the students have any classes 
    //So now the strategy is similar to above but subtracting the classes each student has 

    $creditsAmount = updateCreditsAmountArray($creditsAmount, $classesAmount, 'ClassesAmount');
   
    //Now that the calculation of the remaining credits is done I will add it to the students array
    //using similar strategy as above

    return $creditsAmount;
} 

// --------------------------------------------------------------------------
//This function is used to calculated the remaing credits based of on amountToSubtractArray
//that in this program can be refunds and classes
// --------------------------------------------------------------------------
function updateCreditsAmountArray($creditsAmount, $amountToSubtractArray, $key){
    $creditsAmountUpdated = $creditsAmount;

    //Make an array with only the students ids 
    $studentIdsArray = array_column($amountToSubtractArray, 'StudentId');                                      

    //Now I need to update the credits amount by subtracting the corresponding value
    $i = 0;
    foreach($creditsAmountUpdated as $credit){
        if (in_array($creditsAmountUpdated[$i]['StudentId'], $studentIdsArray)){                                                    //Check if the current studentId is in the array
            foreach($amountToSubtractArray as $amount){                                    
                if($amount['StudentId'] == $creditsAmountUpdated[$i]['StudentId'] ){                                               //When we find the studentId
                    $creditsAmountUpdated[$i]['CreditsAmount'] -= $amount[$key];         
                }
            }   
        }
         $i++;
    }

    return $creditsAmountUpdated;
}

// --------------------------------------------------------------------------
//I'm doing all of these because there are students with no credits so they are no in 
//the credits table. My strategy here is to add a credits key to the students array with 0 credits
//and then update the credits amount. This is the remaining credits they have (not the total of credits) 
//so I'm subtracting the total credits to the total classes they have to get the 
//remaining credits and then update that in the student array
// --------------------------------------------------------------------------

function addRemainingCredits($remainingCredits, $allStudents){ 
    
    $allStudentsUpdated = $allStudents;   
    
    $studentIdsArray = array_column($remainingCredits, 'StudentId');               
    
    $i = 0;
    foreach($allStudentsUpdated as $student){
        $allStudentsUpdated[$i]['Credits']='0';                                               //add a key "credits" to each student and initialize it to 0

        if (in_array($allStudentsUpdated[$i]['StudentId'], $studentIdsArray)){                //branch if the current student id is in the  array

            foreach($remainingCredits as $credit){                                       
                if($credit['StudentId'] == $allStudentsUpdated[$i]['StudentId'] ){            //when the ids are equal
                    $allStudentsUpdated[$i]['Credits'] = $credit['CreditsAmount'];           //update the credits amount (originally 0) with the correct amount. Those without credits will remain with 0
                }
            }       
        }    
        $i++;
    }  
    
    return $allStudentsUpdated;
}

// --------------------------------------------------------------------------
//The strategy for classes in this function is very similar to what I did with credits. 
//I think I will combine these into one and just pass the correct parameters 
// --------------------------------------------------------------------------

function addFutureClassesAmount($futureClassesAmount, $allStudents){

    $allStudentsUpdated = $allStudents;                                          
    $studentIdsArray = array_column($futureClassesAmount, 'StudentId');                   

    $i = 0;
    foreach($allStudentsUpdated as $student){
    
        $allStudentsUpdated[$i]['Classes']='0';                                                   
    
        if (in_array($allStudentsUpdated[$i]['StudentId'], $studentIdsArray)){                 
    
            foreach($futureClassesAmount as $futureClass){                                
                if($futureClass['StudentId'] == $allStudentsUpdated[$i]['StudentId'] ){         
                    $allStudentsUpdated[$i]['Classes'] = $futureClass['ClassesPending'];        
                }
            }       
        }
       
        $i++;
    }

    return $allStudentsUpdated;
}

// --------------------------------------------------------------------------
//Same strategy but slightly different at the end
// --------------------------------------------------------------------------

function addDaysToNextClass($allStudents){
    $allStudentsUpdated = $allStudents;  

    $allFutureClasses = getFutureClasses();                                                     //Gets all the classes that are scheduled 
    $nextClasses= removeDuplicateMultiDArray($allFutureClasses, 'StudentId');                   //I commented in the code: I'm removing the duplicated studentId (the whole element, not only the id) 
                                                                                                //because the query above returns all the future classes of each student. So there could be a student 
                                                                                                //with several future classes (which means if a student has 3 future classes, there will be 3 array 
                                                                                                //elements with the same studentId and just different class information). So this function removes the "duplicates" 
                                                                                                //(perhaps I should name it differently). o consider any element with the same studentId to be a duplicate. 
                                                                                                //In the end, it leaves only one row per student, which will be the next class, since the query is ordered by date.   
    $studentIdsArray = array_column($nextClasses, 'StudentId');                                 
    $today = new DATETIME(date("Y/m/d h:i:s"));                                                //Today will be used to perform the calculation with the class date
  
    $i = 0;
    foreach($allStudentsUpdated as $student){
    
        $allStudentsUpdated[$i]['DaysToNextClass']['Months']='0';                                      //add a DaysToNextClass key that will have days and months initialized to 0
        $allStudentsUpdated[$i]['DaysToNextClass']['Days']='0';
    
        if(in_array($allStudentsUpdated[$i]['StudentId'], $studentIdsArray)){                         //branch if the current student id is in the classes array
    
            foreach($nextClasses as $nextClass){
                if($nextClass['StudentId'] == $allStudentsUpdated[$i]['StudentId']){                 //when the ids are equal
                    $classDate = new DATETIME($nextClass['StartDate']);                              //When performing the calculations with date (see getDayDifference function) I had to use
                                                                                                //new DATETIME to be able to use diff()
                    $allStudentsUpdated[$i]['DaysToNextClass'] = getDayDifference($classDate, $today); //perform the calculation 
                }                                   
            }       
        }
    
        $i++;
    } 
    
    return $allStudentsUpdated;
}


// --------------------------------------------------------------------------
//Here the strategy for one student is similar to what I did for all the students
//but simpler since it is just for one. Get the total credits and subtract any
//refund and any classes to get the remaining credits.
// --------------------------------------------------------------------------

function calcStudentRemainingCredits($studentId){
    $remainingCredits = [];  
    $remainingCredits = getStudentCreditAmount($studentId);                                                  //gets the amount of credits the students has
  
    if(!$remainingCredits){
        $remainingCredits = '0';
    }

    else{
        $remainingCredits = $remainingCredits['CreditsAmount'];        
        $refundAmount = getStudentRefundAmount($studentId);
        $classesAmount = getStudentClassesAmount($studentId);

        if($refundAmount){
            $remainingCredits -= $refundAmount['RefundAmount'];
        }

        if($classesAmount){
            $remainingCredits -= $classesAmount['ClassesAmount'];
        }      
        
    }  
    
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
//There dhould be an better way with js to do this but for now this is my strategy.
//
// --------------------------------------------------------------------------

function searchStudent($allStudents, $fullName){

    
 
    // debug($allStudents);

    // $allstudentsUpdated= [];
    // $studentsFound = [];

    // //get an array with studentsid and full name of each student because I want to search for
    // // //the full name and in the original allstudents array I have firstName and lastName separated 
    // // $i = 0;
    // // foreach($allStudents as $student){  
    // //     $allstudentsUpdated[$i]['StudentId'] = $student['StudentId'];
    // //     $allstudentsUpdated[$i]['FullName'] = $student['FirstName']." ".$student['LastName'];
    // //     $allstudentsUpdated[$i]['Email'] = $student['Email'];
    // //     $allstudentsUpdated[$i]['Phone'] = $student['Phone'];
    // //     $allstudentsUpdated[$i]['FullName']
    // //     $allstudentsUpdated[$i]['FullName']
    // //     $i++;
    // // }

    // $studentIdsArray = array_column($nextClasses, 'StudentId');                                 

    // debug($fullnamesArray);

    // //now I want to know if the student is in the array of full names


    // debug(in_array($fullName, $fullnamesArray));

    // //and if is there I echo it in the table.Will store it in a array in case that there are two people with same name
    // //which is unlikely but it can happen
    
    // if (in_array($fullName, $fullnamesArray)){
    //     $i = 0;
    //     foreach($fullnamesArray as $name){
    //         if($name['FullName'] == $fullName ){
    //             $studentsFound[$i]['StudentId'] = $fullName['StudentId']; 
    //         }
    //         $i++;
    //     }

    //     debug($studentsFound);        
    //  }

    //  echoStudentTable($allStudents[]);

}