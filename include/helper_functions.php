<?php

// --------------------------------------------------------------------------

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

// --------------------------------------------------------------------------

function formatDate($date, $format) {
    $newDateFormat = $date;
    $newDateFormat = new DateTime($newDateFormat);
    $newDateFormat = $newDateFormat->format($format);
    return $newDateFormat;
}

// --------------------------------------------------------------------------

function calculateStudentInfo($studentArray, $studentNumber, $value, $data){ 
    $allInfo = [];
    $temp = [];

    $studentsArray = array_column($studentArray, 'Student_Id');         //Get an array of ids of students with credits       
    $studentArray = array_reverse($studentArray);                  //Reverse it because I will use as stack below
    
    for($i = 0; $i < $studentNumber; $i++){

        if(!in_array($i + 1, $studentsArray)){                                //if the index is not in the array of ids
            $array = array('Student_Id'=> $i + 1, $value=> $data);             //set the id to 0 credit
            array_push($allInfo, $array);                                  //push it to the array
                    
        }

        else{                                                                 //if the index is in the array of ids
            $temp = array_pop($studentArray);                           //pop the last element (since it was reversed it is the first one in the original array)
            array_push($allInfo, $temp);                                   //push it to the array
        }
    }

    return $allInfo;
}

// --------------------------------------------------------------------------

function unique_multidim_array($array, $key) {                            //function to remove duplicates from multidimentional arrays using a kew
    $temp_array = []; 
    $i = 0; 
    $key_array = []; 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) {                          //If the key is not already in the temp array stored it
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}

// --------------------------------------------------------------------------

function calculateDaysToNextClass($dates){
    $today = new DATETIME(currentDate());
    $days = [];
    $i = 0;

    foreach($dates as $date){        
        $classDate = new DATETIME($date['Date']);
        $days[$i] = getDayDifference($classDate, $today);
        $i++;       
    }

    return $days;
}

// --------------------------------------------------------------------------

function currentDate(){
    date_default_timezone_set("America/Chicago");
    return date("Y/m/d h:i:s");
}

// --------------------------------------------------------------------------

function getDayDifference($futureDate, $today){
    return $futureDate->diff($today)->format('%d');
}

// --------------------------------------------------------------------------