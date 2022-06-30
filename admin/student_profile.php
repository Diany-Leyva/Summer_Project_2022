<?php
include('../include/initialize.php');

if(isset($_REQUEST['studentId'])){

    if(isset($_REQUEST['AddCreditsSubmitted'])){    
        insertCredit($_REQUEST['camount'], $_REQUEST['studentId'] );                           
        header("location:? studentId={$_REQUEST['studentId']}");                                              //Passing the id when reloading the page after inserting                   
    }

    if(isset($_REQUEST['AddClassesSubmitted'])){        
      insertClass($_REQUEST['ctype'], $_REQUEST['czoomLink'], $_REQUEST['classDate'], $_REQUEST['studentId']);                           
      header("location:? studentId={$_REQUEST['studentId']}");                           
    } 

    $title = 'Student Profile';
    echoPageLayout($title, $title, '');

    $studentId = $_REQUEST['studentId'];                               
    $student = getStudent($studentId);
    
    echoProfileInfo($student, 'bishop');                                                                     //will handle profiles pictures later
     
    $credits = calcStudentRemainingCredits($studentId);                                                          
    echoAddClassAndAddCreditsButtons($credits);
    
    echo"<div class='flex-container-classesInfo'>";
            echoClassesInfo(getStudentsFutureClasses($studentId), 'Classes Booked');
            echoClassesInfo(getStudentPastClasses($studentId), 'Recent Classes');
            echoNotes($student['PrivateNotes'], 'Private Notes');
            echoNotes($student['PublicNotes'], 'Public Notes');
    echo"</div>"; 
    
    $totalClasses = calculateTotalClasses($studentId);
    echoTotalClassesSection($totalClasses);  
       
    createAddClassForm();
    createAddCreditsForm();
}

echoFooter();    
         




