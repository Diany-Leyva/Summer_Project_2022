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
//This function takes the classes today and check for the time (hour) and if 
//any element's hour is pass current hour then it deletes it from the array
//and then re-index the array.I could do this in SQL but since I have so many 
//queries I will keep this in php. So at the end we return an array with the 
//pending classes today
// --------------------------------------------------------------------------

function calcNextClass($classesToday){
    $nextClasses = $classesToday;  

    if(!empty($nextClasses)){                                                               //Only do theb procces if is not empty because I'm unsure  
        for($i = 0; $i < sizeof($classesToday); $i++){                                      //there could be any odd behiavor when trying to
            if(formatDate($nextClasses[$i]['StartDate'], 'H') < date('H')){                 //re-index an empty array so I will have this for now 
                unset($nextClasses[$i]);
            }
        }
    
        $nextClasses = array_values($nextClasses);
    }    

    return $nextClasses; 
}

// --------------------------------------------------------------------------

function calcTotalClasses(){

    $monthAmount= $yearAmount = [];
    $totalThisYear = getAllClassesAmountThisYear();
    $totalThisMonth = getAllClassesAmountThisMonth();

    (!$totalThisMonth)? $monthAmount = 0 : $monthAmount = $totalThisMonth['Amount'];
    (!$totalThisYear)? $yearAmount = 0 : $yearAmount = $totalThisYear['Amount'];

    return [
        'MonthTotal' => $monthAmount,
        'YearTotal' => $yearAmount        
    ];
}

