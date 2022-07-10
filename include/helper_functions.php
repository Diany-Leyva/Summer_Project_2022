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

function removeDuplicate($arrayWithDuplicates, $key) {                                                                
    $tempArray = [];  
    $i = 0; 
    $keyArray = []; 
    
    foreach($arrayWithDuplicates as $array) { 
        if (!in_array($array[$key], $keyArray)) {                                                                      
            $keyArray[$i] = $array[$key]; 
            $tempArray[$i] = $array; 
        } 
        $i++; 
    } 

    //making sure I return an array indexed by PK
    return getIndexByPKArray($tempArray, $key);                               
}

// --------------------------------------------------------------------------

function getDayDifference($futureDate, $today){ 
    $difference = $futureDate->diff($today);
    $date = [];                                                                                              
    $date['Months'] = $difference->format('%m');
    $date['Days'] = $difference->format('%d');    
    return $date;
}

// --------------------------------------------------------------------------
//This function takes an indexed arrayWithDuplicates and its primary key name, and returns an 
//arrayWithDuplicates that is indexed by the primary key. To make it more generic I passed the 
//primary key name as parameter so it can be used for any arrayWithDuplicates. 
// --------------------------------------------------------------------------

function getIndexByPKArray($arrayWithDuplicatesToUpdate, $primaryKey){

    $newArray = [];
  
    foreach ($arrayWithDuplicatesToUpdate as $arrayWithDuplicates){
        $newArray[$arrayWithDuplicates[$primaryKey]] = $arrayWithDuplicates;
    } 

    return $newArray;
}

// --------------------------------------------------------------------------
