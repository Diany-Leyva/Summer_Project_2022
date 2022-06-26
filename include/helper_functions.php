<?php

// --------------------------------------------------------------------------

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

// --------------------------------------------------------------------------

function emptySpace(){
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

function calcRemainingCredits($allStudents){
    $remainingCredits = [];

    $allCredits = updateStudentInfo(getCreditsAmount(), sizeof($allStudents), 'Credits_Amount', '0');                 //gets the credit total of each student with credits
    $allClasses = updateStudentInfo(getClassesAmount(), sizeof($allStudents), 'Classes_Amount', '0');                 //and fill out with 0 those with not credits (dame with classes)

    for($i = 0; $i < sizeof($allStudents); $i++){       

        if($allCredits[$i]['Student_Id'] == $allStudents[$i]['Student_Id'] &&                       //Check if the function above did the calculations
           $allClasses[$i]['Student_Id'] == $allStudents[$i]['Student_Id']){
                                                                                                    //Might need to check something before?
            $tempAmount = $allCredits[$i]['Credits_Amount'] - $allClasses[$i]['Classes_Amount'];    //Subtract the credits total by the classes total 
                                                                                                    //This caculation is done based on the constraint that each class booked is 60 minutes (not more)
            $remainingCredits[$i]['Student_Id'] = $allStudents[$i]['Student_Id'];                     
            $remainingCredits[$i]['Remaining_Credits'] =  $tempAmount;
        }

        else{
            echo"Student Id does not match";                                                       
        }                                                                                           //Eventually this will be a different error message or something
    } 

    return $remainingCredits;
}

// --------------------------------------------------------------------------

function calcFutureClassesAmount($allStudents){
    $futureClassesAmount = [];

    debugOutput(getFutureClassesAmount());

    $futureClassesAmount = updateStudentInfo(getFutureClassesAmount(), sizeof($allStudents), 'Classes_Pending', '0'); 

    return $futureClassesAmount;
}

// --------------------------------------------------------------------------

function calcDaysToNextClass($allStudents){  
    
         //Get total classes pending per student and fills out those with no classes pending
    $nextClasses= removeDuplicateMultiDArray(getFutureClasses(), 'Student_Id');                                              //gets the classes pending to be taught and remove any duplicate                          
                                                                                                                             //this will keep only the date of the nearest class
    $nextClasses = updateStudentInfo($nextClasses, sizeof($allStudents), 'Date', formatDate(currentDate(), 'Y-m-d H:i:s'));  //Fill out with current date those with not pending classes 
    
    $today = new DATETIME(currentDate());
    $daysToNextClass = [];
    $i = 0;

    foreach($nextClasses as $nextClass){        
        $classDate = new DATETIME($nextClass['Date']);      
        $daysToNextClass[$i] = getDayDifference($classDate, $today);
        $i++;       
    }  
    
    return $daysToNextClass;    
}

// --------------------------------------------------------------------------

function updateStudentInfo($studentArray, $studentNumber, $value, $data){ 
    $allInfo = [];
    $temp = [];

    $studentsArray = array_column($studentArray, 'Student_Id');                                                     //Get an array of ids of students with credits       
    $studentArray = array_reverse($studentArray);                                                                   //Reverse it because I will use as stack below
    
    for($i = 0; $i < $studentNumber; $i++){

        if(!in_array($i + 1, $studentsArray)){                                                                     //if the index is not in the array of ids
            $array = array('Student_Id'=> $i + 1, $value=> $data);                                                 //set the id to 0 credit
            array_push($allInfo, $array);                                                                          //push it to the array
                    
        }

        else{                                                                                                      //if the index is in the array of ids
            $temp = array_pop($studentArray);                                                                      //pop the last element (since it was reversed it is the first one in the original array)
            array_push($allInfo, $temp);                                                                           //push it to the array
        }
    }

    return $allInfo;
}

// --------------------------------------------------------------------------

function removeDuplicateMultiDArray($array, $key) {                                                                 //function to remove duplicates from multidimentional arrays using a kew
    $temp_array = [];  
    $i = 0; 
    $key_array = []; 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) {                                                                      //If the key is not already in the temp array stored it
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}

// --------------------------------------------------------------------------

// function calculateDaysToNextClass($dates){
//     $today = new DATETIME(currentDate());
//     $days = [];
//     $i = 0;

//     foreach($dates as $date){        
//         $classDate = new DATETIME($date['Date']);      
//         $days[$i] = getDayDifference($classDate, $today);
//         $i++;       
//     }
   
//     return $days;    
// }

// --------------------------------------------------------------------------

// function calcAllRemainingCredits($allStudents, $allCredits, $allClasses){         

//     global $remainingCredits;

//     for($i = 0; $i < sizeof($allStudents); $i++){       

//         if($allCredits[$i]['Student_Id'] == $allStudents[$i]['Student_Id'] &&                       //Check if the function above did the calculations
//            $allClasses[$i]['Student_Id'] == $allStudents[$i]['Student_Id']){
//                                                                                                     //Might need to check something before?
//             $tempAmount = $allCredits[$i]['Credits_Amount'] - $allClasses[$i]['Classes_Amount'];    //Subtract the credits total by the classes total 
//                                                                                                     //This caculation is done based on the constraint that each class booked is 60 minutes (not more)
//             $remainingCredits[$i]['Student_Id'] = $allStudents[$i]['Student_Id'];                     
//             $remainingCredits[$i]['Remaining_Credits'] =  $tempAmount;
//         }

//         else{
//             echo"Student Id does not match";                                                       
//         }                                                                                           //Eventually this will be a different error message or something
//     } 
// }

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

function getDayDifference($futureDate, $today){ 
    $difference = $futureDate->diff($today);
    $date = [];                                                                                              //I wonder if I should out the year too just in case
    $date['Months'] = $difference->format('%m');
    $date['Days'] = $difference->format('%d');    
    return $date;
}

// --------------------------------------------------------------------------

function calculateTotalClasses($classesThisMonth, $classesThisYear){
    global $monthAmount, $yearAmount;
    
    (!$classesThisMonth)? $monthAmount = 0 : $monthAmount = $classesThisMonth['Amount'];
    (!$classesThisYear)? $yearAmount = 0 : $yearAmount = $classesThisYear['Amount'];
}
// --------------------------------------------------------------------------


