<?php

// --------------------------------------------------------------------------
//This function calculates the remaining credits each student has (all at once)
//considering the refunds and also the classes booked.
// --------------------------------------------------------------------------


function calcRemainingCredits(){   

    $creditsAmount = getIndexByPKArray(getAllCreditsAmount(), 'StudentId');
    $classesAmount = getIndexByPKArray(getAllClassesAmount(), 'StudentId');
    $refundsAmount = getIndexByPKArray(getAllRefundsAmount(), 'StudentId');    
                                      
    //Do the calculation based on the refunds the students have. Each student 
    //has a certain amount of credits in the table, but I need to consider wheter
    //a refund was made, and if so I need to subtract that from the orginal amount

    $creditsAmount = updateCreditsAmountArray($creditsAmount, $refundsAmount, 'RefundAmount');                                

    //Now we need to consider if the students have any classes 
    //So now the strategy is similar to above but subtracting the amount of classes each student has 

    $creditsAmount = updateCreditsAmountArray($creditsAmount, $classesAmount, 'ClassesAmount');
    
    return $creditsAmount;
} 

// --------------------------------------------------------------------------
//This function is used to calculate the remaing credits based of the amountToSubtractArray
// --------------------------------------------------------------------------
function updateCreditsAmountArray($creditsAmount, $amountToSubtractArray, $keyTosubtract){
    
    $creditsAmountUpdated = $creditsAmount;                                      
   
    //Loop through, and check if the current key (studentID) is in the array of ids 
    //from the amountToSubtractArray (array or refunds or classes) and then if the id 
    //is there subtract the creditsa from the original amount of credits 
    foreach($creditsAmountUpdated as $key=>$credit){   
        if(in_array($key, array_column($amountToSubtractArray, 'StudentId'))){       
            $creditsAmountUpdated[$key]['CreditsAmount'] -= $amountToSubtractArray[$key][$keyTosubtract];     
        }     
    }                 
       
    return $creditsAmountUpdated;
}

// --------------------------------------------------------------------------
//I'm doing all of these because there are students with no credits so they are no in 
//the credits table. My strategy here is to add a credits key to the students array with 0 credits
//and then update the credits amount. This is the remaining credits they have (not the total of credits)
// --------------------------------------------------------------------------

function addRemainingCredits($remainingCredits, $allStudents){ 
    
    $allStudentsUpdated = $allStudents;    
       
    foreach($allStudentsUpdated as $key=>$student){ 
        $allStudentsUpdated[$key]['Credits'] = '0';  

        if(in_array($key, array_column($remainingCredits, 'StudentId'))){       
            $allStudentsUpdated[$key]['Credits'] = $remainingCredits[$key]['CreditsAmount'];     
        }     
    }  
    
    return $allStudentsUpdated;
}

// --------------------------------------------------------------------------
//The strategy for classes in this function is very similar to what I did with credits. 
//I think I will combine these into one and just pass the correct parameters 
// --------------------------------------------------------------------------

function addFutureClassesAmount($futureClassesAmount, $allStudents){

    $allStudentsUpdated = $allStudents; 
    
    foreach($allStudentsUpdated as $key=>$student){ 
        $allStudentsUpdated[$key]['Classes'] = '0';  

        if(in_array($key, array_column($futureClassesAmount, 'StudentId'))){       
            $allStudentsUpdated[$key]['Classes'] = $futureClassesAmount[$key]['ClassesPending'];     
        }     
    }

    return $allStudentsUpdated;
}

// --------------------------------------------------------------------------
//Same strategy but slightly different at the end. So I'm adding a DaysToNextCLass
//key to each element its the corresponding values  
// --------------------------------------------------------------------------

function addDaysToNextClass($allStudents){
    $allStudentsUpdated = $allStudents;
   
    $allClasses = getIndexByPKArray(getAllClasses(), 'ClassId');                                                            //Making sure is indexed by pk
    $allFutureClasses = calcFutureClasses($allClasses);                                                                     //calc the future classes      
    $studentsNextClass= removeDuplicate($allFutureClasses, 'StudentId');                                                    //I'm removing the duplicated students to leave only the next class (previus wuery is ordered by StartDate)
                                                                                          
    foreach($allStudentsUpdated as $key=>$student){ 
        $allStudentsUpdated[$key]['DaysToNextClass']['Months'] = '0';  
        $allStudentsUpdated[$key]['DaysToNextClass']['Days'] = '0'; 

        if(in_array($key, array_column($studentsNextClass, 'StudentId'))){ 
           $classDate = new DATETIME($studentsNextClass[$key]['StartDate']);                                              
           $allStudentsUpdated[$key]['DaysToNextClass'] = getDayDifference($classDate, new DATETIME(date('Y/m/d H:i:s')));  //My getDayDifference performs accurate calculation if I use nes DATETIME why? Who knows 
        }      
    }

    return $allStudentsUpdated;
}


// --------------------------------------------------------------------------
// Here the strategy for one student is similar to what I did for all the students
// but simpler since it is just for one. Get the total credits and subtract any
// refund and any classes to get the remaining credits.
// --------------------------------------------------------------------------

function calcStudentRemainingCredits($studentId){
    
    $remainingCredits = getOneStudentCreditAmount($studentId);                                                  //gets the amount of credits the students has
        
    if(!$remainingCredits){
        $remainingCredits = '0';
    }

    else{
        $remainingCredits = $remainingCredits['CreditsAmount'];        
        $refundAmount = getOneStudentRefundAmount($studentId);
        $classesAmount = getOneStudentClassesAmount($studentId);

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
//This function calculates the total classes a students has. It takes a format
//parameter that it will indicate what total to calc. This can be used for years, 
//months, days etc.
// --------------------------------------------------------------------------

function calcTotalClasses($classes, $format){
    $amount = 0;

    foreach($classes as $class){      
        if(formatDate($class['StartDate'], $format) == date($format)){
            $amount++;
        }
    } 
   
    return $amount;
}

// --------------------------------------------------------------------------

