<?php
include('../include/initialize.php'); 

//get all the students with classes including the student information (join query), 
//and then calc today classes on the fly
$allStudentsWithClasses = getIndexByPKArray(getAllStudentsWithClasses(), 'ClassId');
$classesToday = calcClassesToday($allStudentsWithClasses);

$size = sizeof($classesToday);

//just to handle singular and plural for the classes message
$word = 'classes';
if($size == 1){
    $word = 'class';
}

$headingInfo = "You have ".$size." ".$word." scheduled today";

if($size == 0){
    $headingInfo = 'No classes scheduled today';
}

echoPageLayout('Home', 'Welcome back, Yuniesky', $headingInfo);

$nextClasses = calcFutureClasses($classesToday); 

//nextClasses above will have all the pending classes today, and the query was ordered by stratDate so
//the first class in the array, if any, is the next class
$nextclass = [];
if(!empty($nextClasses)){                                               
    $nextclass = $nextClasses[0];  
}                                                 
                                             
echoNextClassSection($nextclass);                                                          

$totalClasses = calcTotalClasses();
echoIndexTotalSection($totalClasses);
echoDayViewCalendar();
echoEvents($classesToday);
echoFooter(); 