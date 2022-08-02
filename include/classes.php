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

function getEvents(){

    $allStudentsWithClasses = getIndexByPKArray(getAllStudentsWithClasses(), 'ClassId');
    $classesToday = calcClasses($allStudentsWithClasses, 'Y/m/d');
    $events = [];                                                                         //Array to hold the start/end of every class today
     
    $i = 0;                                                                               
    foreach($classesToday as $class){      
        $hour = formatDate(htmlspecialchars($class['StartDate']), 'H');            
        $min = formatDate(htmlspecialchars($class['StartDate']), 'i');  
        $halfhour = 0;

        if($min == 30){
            $halfhour = 30;
        }
      
        $topPosition = (60 * ($hour - 7)) + $halfhour;    
        
        //I'm storing all the information beacuse I use it to display the class Info in js later on
        //and this is the source 
        $events[$i]['start'] =  $topPosition;  
        $events[$i]['end'] =  $topPosition + 60;  
        $events[$i]['ClassId'] = htmlspecialchars($class['ClassId']);  
        $events[$i]['Type'] = htmlspecialchars($class['Type']);
        $events[$i]['StartDate'] = formatDate(htmlspecialchars($class['StartDate']), 'Y-m-d');
        $events[$i]['StartTime'] = formatDate(htmlspecialchars($class['StartDate']), 'H:i');
        $events[$i]['LichessLink'] = htmlspecialchars($class['LichessLink']);
        $events[$i]['ZoomLink'] = htmlspecialchars($class['ZoomLink']); 
        $events[$i]['StudentId'] = htmlspecialchars($class['StudentId']);  
        $events[$i]['FirstName'] = htmlspecialchars($class['FirstName']);
        $events[$i]['LastName'] = htmlspecialchars($class['LastName']);       
        $events[$i]['Email'] = htmlspecialchars($class['Email']);    
       
        $i++;     
    }

    return $events;
}

// ********************************************************************************************************************************

function getCurrentTimeArray(){
    $currentTime = date('H:i');   
    $timeArray = [];
    $hour = formatDate($currentTime, 'H');  
    $minutes = formatDate($currentTime, 'i');  

    if($hour > 7 &&                                            //because I just want to show it in the timeframe of my calendar 8:00-23:00
       $hour < 24){

        $top = (60 * ($hour - 7)) + $minutes; 
   
        $timeArray[0]['start'] =  $top;  
        $timeArray[0]['end'] =  $top + 0.5;
        $timeArray[0]['currentTime'] =  $currentTime; 
    }   
    
    return $timeArray;
}

// ********************************************************************************************************************************
