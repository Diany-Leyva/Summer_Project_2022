<?php
include('../include/initialize.php');


if(isset($_REQUEST['studentId'])){

  if(isset($_REQUEST['AddStudentSubmitted'])){
    $errors = [];
    validateName($_REQUEST['ufname']);
    validateName($_REQUEST['ulname']); 
      
    if(sizeof($errors) == 0){
      updateStudent($_REQUEST['ufname'], $_REQUEST['ulname'], $_REQUEST['uemail'], $_REQUEST['uphone'], $_REQUEST['urating'], $_REQUEST['ulichess'], $_REQUEST['studentId']);                                                                    
      header("location:? studentId={$_REQUEST['studentId']}");                                                                  
    }   
     
    else{
    //debug($errors);                                                                                         //This is just to try I will display correct message in the form
    }
  }     

    if(isset($_REQUEST['changeCreditsSubmitted'])){
     
      if($_REQUEST['hiddenValue'] == 'Add'){                                                                  //Since I'm using the same form to add and subtract credits
          insertCredit($_REQUEST['camount'], $_REQUEST['studentId']);                                         //I set a hidden value that will indicate whether add or subtract was clicked
      }  

      else if($_REQUEST['hiddenValue'] == 'Subtract'){
        insertRefund($_REQUEST['camount'], $_REQUEST['studentId']);                                          //Comments about why I'm inserting to a refund table are in the function definition
      }     
                                  
      header("location:? studentId={$_REQUEST['studentId']}");                                              //Passing the id when reloading the page after inserting                   
    }

    if(isset($_REQUEST['AddClassesSubmitted'])){
         
      insertClass($_REQUEST['ctype'], $_REQUEST['czoomLink'], $_REQUEST['classDate'], $_REQUEST['studentId']);                           
      header("location:? studentId={$_REQUEST['studentId']}");                           
    } 

    if(isset($_REQUEST['studentDeleted'])){
     
      deleteStudent($_REQUEST['stdId']);                                                                    
      header("location:/admin/list_students.php");     
    } 

    if(isset($_REQUEST['classDeleted'])){   
      deleteClass($_REQUEST['classId']);                                                                    
      header("location:? studentId={$_REQUEST['studentId']}");        
    } 

    if(isset($_REQUEST['privNotesSaveButtonSubmitted'])){   
       
      updateNotes($_REQUEST['studentId'], $_REQUEST['privateNotes'], 'PrivateNotes');                                                                    
      header("location:? studentId={$_REQUEST['studentId']}");        
    } 

    if(isset($_REQUEST['publicNotesSaveButtonSubmitted'])){  
      updateNotes($_REQUEST['studentId'], $_REQUEST['publicNotes'], 'PublicNotes');                                                                   
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
            echoFutureClassesInfo(getStudentsFutureClasses($studentId), 'Classes Booked');
            echoPastClassesInfo(getStudentPastClasses($studentId), 'Recent Classes');
            echoPrivateNotes($student['PrivateNotes']);
            echoPublicNotes($student['PublicNotes']);
    echo"</div>"; 
    
    $totalClasses = calculateTotalClasses($studentId);
    echoTotalClassesSection($totalClasses);  
       
    addClassForm();
    changeCreditsForm();
    deleteStudentForm();
    addStudentForm();
    deleteClassForm();
}

echoFooter();    
         




