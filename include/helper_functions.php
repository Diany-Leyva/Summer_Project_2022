<?php

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

function formatDate($date, $format) {
    $newDateFormat = $date;
    $newDateFormat = new DateTime($newDateFormat);
    $newDateFormat = $newDateFormat->format($format);
    return $newDateFormat;
}

function calculateStudentInfo($studentArray, $studentNumber, $value){ 
    $allInfo = [];
    $temp = [];

    $studentsArray = array_column($studentArray, 'Student_Id');         //Get an array of ids of students with credits       
    $studentArray = array_reverse($studentArray);                  //Reverse it because I will use as stack below
    
    for($i = 0; $i < $studentNumber; $i++){

        if(!in_array($i + 1, $studentsArray)){                                //if the index is not in the array of ids
            $array = array('Student_Id'=> $i + 1, $value=> 0);             //set the id to 0 credit
            array_push($allInfo, $array);                                  //push it to the array
                    
        }

        else{                                                                 //if the index is in the array of ids
            $temp = array_pop($studentArray);                           //pop the last element (since it was reversed it is the first one in the original array)
            array_push($allInfo, $temp);                                   //push it to the array
        }
    }

    return $allInfo;

}