<?php
include('../include/initialize.php'); 

//get all the students with classes including the student information (join query), 
//and then calc today classes on the fly
$allStudentsWithClasses = getIndexByPKArray(getAllStudentsWithClasses(), 'ClassId');
$classesToday = calcClasses($allStudentsWithClasses, 'Y/m/d');
$allStudents = getIndexByPKArray(getAllStudents(), 'StudentId');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    

    if(isset($_REQUEST['loginSubmitted'])){
        debug($_REQUEST);
        die();
    }   

    if(isset($_REQUEST['AddClassesSubmitted'])){ 
               
        $studentId = $_REQUEST['listStudentId'];       

        //If the toggle was on add one credit to the student 
        if(isset($_REQUEST['StdToggle'])){
            insertCredit(1, $studentId);
        }       
        //when a class is submitted so far I'm not letting the students to be able to book a class
        //if they haven't paid. it happened in the past that when Yuni did not charged in advance
        //some people would not paid after the lesson, so unless is a student that has been with
        //for a long time he requires payment in advance (mostly with new students). So, here I'm
        //checking if the student has credits available.
        //I already check for this on the form so technically the user wil not be able to schedule a
        //class if it has no credits so I could get rid of this. Or should I leave it as precaution 
        //Even if the person did not have creadits, if everything else worked fine, this shouls be al least 1     
        $credits = calcStudentRemainingCredits($studentId);

        if(!empty($credits)){
            $date = formatDate($_REQUEST['classDate']." ".$_REQUEST['classTime'], 'Y/m/d H:i:s');              
            insertClass($_REQUEST['ctype'], $_REQUEST['czoomLink'], $date, $studentId); 
        }           
                                  
        header("location:?"); 
        exit();                           
    } 

    if(isset($_REQUEST['EditClassesSubmitted'])){         
        $date = formatDate($_REQUEST['classDate']." ".$_REQUEST['classTime'], 'Y/m/d H:i:s');
        updateClass($_REQUEST['classId'], $_REQUEST['ctype'], $_REQUEST['czoomLink'], $date);                                                                    
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

echoHeader('Home');
echoPageLayout('Welcome back, Yuniesky', $headingInfo);
                                       
echoNextClassSection($classesToday);                                                      

$totalClasses = [];
$totalClasses['MonthTotal'] = calcTotalClasses($allStudentsWithClasses, 'Y/m');   
$totalClasses['YearTotal'] = calcTotalClasses($allStudentsWithClasses, 'Y');

echoIndexTotalSection($totalClasses);
echoDayViewCalendar();
addEvents($classesToday);
addCurrentTime();
classFormIndexPage($allStudents);
deleteClassForm();
echoCommonJSFiles();
echoFooter(); 