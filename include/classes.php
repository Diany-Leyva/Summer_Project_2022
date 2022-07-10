<?php

//This function takes all the classes as parameter and it returns an array
//with only the classes scheduled in the future 
// --------------------------------------------------------------------------

function calcFutureClasses($classes){

    $futureClasses = []; 
    
    foreach($classes as $key=>$class){
        if(formatDate($class['StartDate'], 'Y/m/d H:i') > date('Y/m/d H:i')){
            $futureClasses[$key] = $class;
        }
    }

    return $futureClasses;
}

//This function takes all the classes as parameter and it returns an array
//with only the classes scheduled in the past 
// --------------------------------------------------------------------------

function calcPastClasses($classes){

    $pastClasses = []; 
    
    foreach($classes as $key=>$class){
        if(formatDate($class['StartDate'], 'Y/m/d H:i') < date('Y/m/d H:i')){
            $pastClasses[$key] = $class;
        }
    }

    return $pastClasses;
}


// --------------------------------------------------------------------------
// This function takes the array with all classes and it compares the dates
// with the current year,month and date and return an array with the classes scheduled 
// today
// --------------------------------------------------------------------------

function calcClassesToday($classes){
    $classesToday = []; 

    foreach($classes as $key=>$class){
        if(formatDate($class['StartDate'], 'Y/m/d') == date('Y/m/d')){
            $classesToday[$key] = $class;
        }
    }   

    return $classesToday; 
}

// --------------------------------------------------------------------------

function calcTotalClasses(){

    $monthAmount= $yearAmount = [];

    $totalThisYear = getAllClassesAmountThisYear();                                        //I'm keeping this queries for now but might change this to php 
    $totalThisMonth = getAllClassesAmountThisMonth();

    (!$totalThisMonth)? $monthAmount = 0 : $monthAmount = $totalThisMonth['Amount'];
    (!$totalThisYear)? $yearAmount = 0 : $yearAmount = $totalThisYear['Amount'];

    return [
        'MonthTotal' => $monthAmount,
        'YearTotal' => $yearAmount        
    ];
}

// --------------------------------------------------------------------------
