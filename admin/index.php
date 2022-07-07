<?php
include('../include/initialize.php'); 

$futureClasses = getFutureClassesWithStudentNames();
$classesToday = calcClassesToday($futureClasses);

$size = sizeof($classesToday);

$word = 'classes';
if($size == 1){
    $word = 'class';
}

echoPageLayout('Home', 'Welcome back, Yuniesky', "You have ".sizeof($classesToday)." ".$word." today");

if(!empty($classesToday)){
    $nextClass = $classesToday['0'];                                                                  //My query is ordered by date so this is the next class.
}                                                    

else{
    //Pending to handle when there are no classes
}

echoNextClassSection($nextClass);

$totalClasses = calcTotalClasses();
echoIndexTotalSection($totalClasses);
echoDayViewCalendar();
echoEvents($classesToday);
echoFooter(); 