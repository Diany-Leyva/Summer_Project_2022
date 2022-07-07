<?php

// --------------------------------------------------------------------------
//This function takes the array with future classes and it compares the dates
//with the current date to then delete those dates different from today. Here
//when I use unset it does not adjust the indexes of the array, so I had to
//us array-values to re-index it because I work with the index later on to
//get the first element that it is the next class
// --------------------------------------------------------------------------

function calcClassesToday($futureClasses){
    $classesToday = $futureClasses; 

    for($i = 0; $i < sizeof($futureClasses); $i++){
        if(formatDate($classesToday[$i]['StartDate'], 'Y/m/d') != date("Y/m/d")){
            unset($classesToday[$i]);
        }
    }   
    $classesToday = array_values($classesToday);

    return $classesToday; 
}

// --------------------------------------------------------------------------

function calcTotalClasses(){

    $monthAmount= $yearAmount = [];
    $totalThisYear = getClassesAmountThisYear();
    $totalThisMonth = getClassesAmountThisMonth();

    (!$totalThisMonth)? $monthAmount = 0 : $monthAmount = $totalThisMonth['Amount'];
    (!$totalThisYear)? $yearAmount = 0 : $yearAmount = $totalThisYear['Amount'];

    return [
        'MonthTotal' => $monthAmount,
        'YearTotal' => $yearAmount        
    ];
}

// --------------------------------------------------------------------------
