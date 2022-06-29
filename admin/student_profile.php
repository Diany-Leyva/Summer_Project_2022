<?php
include('../include/initialize.php');

$title = 'Student Profile';
echoPageLayout($title, $title, '');

if(isset($_REQUEST['studentId'])){
    $studentId = $_REQUEST['studentId'];                               
    $student = getStudent($studentId);
    
    if(!empty($student)){     
        echoProfileInfo($student, 'bishop');                                             //will handle profiles pictures later
    }                                                        
                   
    else{
        echo"No student!";                                                               //This will be used properly later on(e.g. showing the correct message etc)
    }         
    
    echoAddClassAndAddCreditsButtons(calcStudentRemainingCredits($studentId));
    
    echo"<div class='flex-container-classesInfo'>";
            echoClassesInfo(getFutureClassesbyStudent($studentId), 'Classes Booked');
            echoClassesInfo(getStudentPastClasses($studentId), 'Recent Classes');
            echoNotes($student['Private_Notes'], 'Private Notes');
            echoNotes($student['Public_Notes'], 'Public Notes');
    echo"</div>"; 
    
    $totalClasses = calculateTotalClasses(getStudentClassesAmountThisMonth($studentId), getStudentClassesAmountThisYear($studentId));

    echoTotalClassesSection($totalClasses);
    
    if(isset($_REQUEST['AddCreditsSubmitted'])){    
          updateCredits_TableDB();                           
          header("location:? studentId={$_REQUEST['studentId']}");                                              //Passing the id when reloading the page after updating                   
    }

    if(isset($_REQUEST['AddClassesSubmitted'])){        
        updateClasses_TableDB();                           
        header("location:? studentId={$_REQUEST['studentId']}");                           
    }
    
    createAddClassForm();
    createAddCreditsForm();
}

echoFooter();    
         




