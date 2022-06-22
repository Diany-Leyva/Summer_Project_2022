<?php
include('../include/initialize.php');

$tittle = "Student Profile";
echoHeader($tittle); 
echoVerticalBar();
echoHorizontalBar($tittle, "");

if(isset($_REQUEST['id'])){

    $studentId = $_REQUEST['id'];                               
    $student = getStudent($studentId);
    
    if(!empty($student)){     
        echoProfileInfo($student, 'bishop');                                             //will handle profiles pictures later
    }                                                        
                   
    else{
        echo"No student!";                                                               //This will be used properly later on(e.g. showing the correct message etc)
    }         
    
    echoFormButtons(calcStudentRemainingCredits($studentId));
    
    echo"<div class='flex-container-classesInfo'>";
            echoClassesInfo(getFutureClassesbyStudent($studentId), 'Classes Booked');
            echoClassesInfo(getStudentPastClasses($studentId), 'Recent Classes');
            echoNotes($student['Private_Notes'], 'Private Notes');
            echoNotes($student['Public_Notes'], 'Public Notes');
    echo"</div>";   

    $monthAmount = $yearAmount = ''; 
    calculateTotalClasses(getStudentClassesAmountThisMonth($studentId),                   
                          getStudentClassesAmountThisYear($studentId));  

    echoTotalClassesSection($monthAmount, $yearAmount);
    
    if(isset($_REQUEST['AddCredditsSubmitted'])){    
          updateCredits_TableDB();                           
          header("location:? id={$_REQUEST['id']}");                                              //Passing the id when reloading the page after updating                   
    }

    if(isset($_REQUEST['AddClassesSubmitted'])){        
        updateClasses_TableDB();                           
        header("location:? id={$_REQUEST['id']}");                           
    }
    
    createAddClassForm();
    createAddCreditsForm();
}

echoFooter();    
         




