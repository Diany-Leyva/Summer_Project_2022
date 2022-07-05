<?php

// --------------------------------------------------------------------------

function debug($input){
    echo "<pre>";
    var_dump($input);
    echo "<br></br>
          <br></br>
         </pre>";
}

// --------------------------------------------------------------------------

function formatDate($date, $format){
    $newDateFormat = $date;
    $newDateFormat = new DateTime($newDateFormat);
    $newDateFormat = $newDateFormat->format($format);
    return $newDateFormat;
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


