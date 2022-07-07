<?php
include('../include/initialize.php'); 

$futureClasses = getFutureClassesWithStudentInfo();
$classesToday = calcClassesToday($futureClasses);
$size = sizeof($classesToday);

//just to handle singular and plural for the classes message
$word = 'classes';
if($size == 1){
    $word = 'class';
}

$headingInfo = "You have ".$size." ".$word." today";

if($size == 0){
    $headingInfo = 'No classes today';
}

echoPageLayout('Home', 'Welcome back, Yuniesky', $headingInfo);

$nextClasses = calcNextClass($classesToday); 

$nextclass = [];
if(!empty($nextClasses)){                                               //Branch only if the are next classes for same reason above
    $nextclass = $nextClasses[0];  
}                                                 
                                             
echoNextClassSection($nextclass);                                                          

$totalClasses = calcTotalClasses();
echoIndexTotalSection($totalClasses);
echoDayViewCalendar();
echoEvents($classesToday);
echoFooter(); 