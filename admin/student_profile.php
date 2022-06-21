<?php
include('../include/initialize.php');

$tittle = "Student's Profile";
echoHeader($tittle); 
echoVerticalBar();
echoHorizontalBar($tittle, "");

if(isset($_REQUEST['id'])){
    $studentId = $_REQUEST['id'];                                //Need to work on what if the id is not passed to request, what message or behavior the page will have? 
    $student = getStudent($studentId);
    
    if(!isEmpty($student)){     
        echoProfileInfo($student, 'bishop');                    //will handle profiles pictures later
    }                                                        
                   
    else{
        echo"No student!";                                      //This will be used properly later on(e.g. showing the correct message etc)
    }         
    
    echoFormButtons(calcStudentRemainingCredits($studentId));
    
    echo"<div class='flex-container-classesInfo'>";
    echoClassesInfo(getFutureClassesbyStudent($studentId), 'Classes Booked');
    echoClassesInfo(getStudentPastClasses($studentId), 'Recent Classes');
    echoNotes($student['Private_Notes'], 'Private Notes');
    echoNotes($student['Public_Notes'], 'Public Notes');
    echo"   </div>";
    
    
    $classesThisMonth = getStudentClassesAmountThisMonth($studentId);
    $classesThisYear = getStudentClassesAmountThisYear($studentId);
    
    (!$classesThisMonth)? $monthAmount = 0 : $monthAmount = $classesThisMonth['Amount'];
    (!$classesThisYear)? $yearAmount = 0 : $yearAmount = $classesThisYear['Amount'];
    
    echoTotalClassesSection($monthAmount, $yearAmount);
    
    if(isset($_REQUEST['AddCredditsSubmitted'])){
        // validateName($errors);
      // validateEmail($errors);
     // if(sizeof($errors) == 0){    
          updateCredits_TableDB();                           //Here we are storing in the database what is written in the URL
          header("location:? id={$_REQUEST['id']}");         //Passing the id when reloading the page                      
     // }    
    }

    if(isset($_REQUEST['AddClassesSubmitted'])){
        // validateName($errors);
      // validateEmail($errors);
     // if(sizeof($errors) == 0){    
          updateClasses_TableDB();                           //Here we are storing in the database what is written in the URL
          header("location:? id={$_REQUEST['id']}");         //Passing the id when reloading the page                      
     // }    
    }
    
    createAddClassForm();
    createAddCreditsForm();
}
// debugOutput($_REQUEST);
// debugOutput($_REQUEST['AddCredditsSubmitted']);
// debugOutput($_REQUEST['camount']);
// debugOutput($_REQUEST['id']);
// debugOutput(isset($_REQUEST['AddCredditsSubmitted']));

echoFooter();    
         




