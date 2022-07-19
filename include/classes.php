<?php

// *********************************************************************************************************************************
//This function takes all the classes as parameter and it returns an array
//with only the classes scheduled in the future 
// *********************************************************************************************************************************

function calcFutureClasses($classes){

    $futureClasses = []; 
    
    foreach($classes as $key=>$class){
        if(formatDate($class['StartDate'], 'Y/m/d H:i') > date('Y/m/d H:i')){
            $futureClasses[$key] = $class;
        }
    }

    return $futureClasses;
}

// *********************************************************************************************************************************
//This function takes all the classes as parameter and it returns an array
//with only the classes scheduled in the past 
// *********************************************************************************************************************************

function calcPastClasses($classes){

    $pastClasses = []; 
    
    foreach($classes as $key=>$class){
        if(formatDate($class['StartDate'], 'Y/m/d H:i') < date('Y/m/d H:i')){
            $pastClasses[$key] = $class;
        }
    }

    return $pastClasses;
}

// *********************************************************************************************************************************
// This function takes the array with classes and it compares the dates
// acording to a format passed as parameter and return an array with the classes 
//scheduled. It can be used to calc classes today, this month, this year etc
// *********************************************************************************************************************************

function calcClasses($classes, $format){
    $classesToday = []; 

    foreach($classes as $key=>$class){
        if(formatDate($class['StartDate'], $format) == date($format)){
            $classesToday[$key] = $class;
        }
    }   

    return $classesToday; 
}

// *********************************************************************************************************************************
//This function calls the compareDate function through the usort method to
//sort the array by date, and then the function returns the first element 
//since is the next class
// *********************************************************************************************************************************

function calcNextClass($nextClasses){
    
    $nextClass = []; 

    usort($nextClasses, 'compareDate');                                       //this method returns an indexed array sorted by date
    $nextClasses = getIndexByPKArray($nextClasses, 'ClassId');                //make it indexed by PK

    if(!empty($nextClasses)){
        $key = array_key_first($nextClasses);                                 //get the key of first element   
        $nextClass = $nextClasses[$key];                                       
    }   

    return $nextClass;
 
}

// *********************************************************************************************************************************

