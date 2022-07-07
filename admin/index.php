<?php
include('../include/initialize.php'); 

$futureClasses = getFutureClassesWithStudentInfo();
// debug($futureClasses);
$classesToday = calcClassesToday($futureClasses);

$size = sizeof($classesToday);

$word = 'classes';
if($size == 1){
    $word = 'class';
}

echoPageLayout('Home', 'Welcome back, Yuniesky', "You have ".sizeof($classesToday)." ".$word." today");

if(!empty($classesToday)){
    $nextClasses = calcNextClass($classesToday);                                                     
}                                                  

else{
    //Pending to handle when there are no classes
}

echoNextClassSection($nextClasses[0]);                                                          

$totalClasses = calcTotalClasses();
echoIndexTotalSection($totalClasses);
echoDayViewCalendar();
echoEvents($classesToday);
echoFooter(); 