<?php
include('../include/initialize.php'); 

//get all the students with classes including the student information (join query), 
//and then calc today classes on the fly
$allStudentsWithClasses = getIndexByPKArray(getAllStudentsWithClasses(), 'ClassId');
$classesToday = calcClasses($allStudentsWithClasses, 'Y/m/d');
$allStudents = getIndexByPKArray(getAllStudents(), 'StudentId');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_REQUEST['AddClassesSubmitted'])){ 
        
        //when a class is submitted so far I'm not letting the students to be able to book a class
        //if they haven't paid. it happened in the past that when Yuni did not charged in advance
        //some people would not paid after the lesson, so unless is a student that has been with
        //for a long time he requires payment in advance (mostly with new students). So, here I'm
        //checking if the student has credits available.
        $studentId = $_REQUEST['listStudentId'];
        $credits = calcStudentRemainingCredits($studentId); 

        if(!empty($credits)){
            $date = formatDate($_REQUEST['classDate']." ".$_REQUEST['classTime'], 'Y/m/d H:i:s');              
            insertClass($_REQUEST['ctype'], $_REQUEST['czoomLink'], $date, $studentId); 
        }

        else{
            echo "alert('JavaScript Alert Box by PHP')"; 
        }        
                                  
        header("location:?"); 
        exit();                           
    } 

    if(isset($_REQUEST['classDeleted'])){       
        deleteClass($_REQUEST['classId']);                                                                    
        header("location:?");   
        exit();       
      } 
}

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
classFormIndexPage($allStudents);
deleteClassForm();
echoFooter(); 