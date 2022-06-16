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

function calculateCredits($studentWithCredits, $studentNumber){ 
    $allCredits = [];
    $temp = [];

    $studentsArray = array_column($studentWithCredits, 'Student_Id');         //Get an array of ids of students with credits       
    $studentWithCredits = array_reverse($studentWithCredits);                  //Reverse it because I will use as stack below
    
    for($i = 0; $i < $studentNumber; $i++){

        if(!in_array($i + 1, $studentsArray)){                                //if the index is not in the array of ids
            $array = array('Student_Id'=> $i + 1, 'Credits'=> 0);             //set the id to 0 credit
            array_push($allCredits, $array);                                  //push it to the array
                    
        }

        else{                                                                 //if the index is in the array of ids
            $temp = array_pop($studentWithCredits);                           //pop the last element (since it was reversed it is the first one in the original array)
            array_push($allCredits, $temp);                                   //push it to the array
        }
    }

    return $allCredits;

}