<?php
include('../include/initialize.php'); 

//get all the students with classes including the student information (join query), 
//and then calc today classes on the fly
$allStudentsWithClasses = getIndexByPKArray(getAllStudentsWithClasses(), 'ClassId');
$classesToday = calcClasses($allStudentsWithClasses, 'Y/m/d');

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
$nextclass = [];

if(!empty($nextClasses)){                                                                //I checked this within the function but will keep this here just in case                                           

    $nextclass = calcNextClass($nextClasses);
}  
                                       
echoNextClassSection($nextclass);                                                      

$totalClasses = [];
$totalClasses['MonthTotal'] = calcTotalClasses($allStudentsWithClasses, 'Y/m');   
$totalClasses['YearTotal'] = calcTotalClasses($allStudentsWithClasses, 'Y');

echoIndexTotalSection($totalClasses);
echoDayViewCalendar();
addEvents($classesToday);
echoFooter(); 