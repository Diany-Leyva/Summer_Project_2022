<?php
include('../include/initialize.php');
checkAdmin();
$adminId = $_SESSION['AdminId'];
$admin = getOneAdmin($adminId);

if(isset($_REQUEST['studentId'])){

  if(isset($_REQUEST['EditStudentSubmitted'])){
    $errors = [];
    $errors = validateName($_REQUEST['ufname']);                                                                       
    $errors = validateName($_REQUEST['ulname']); 
    $lichesslink = "https://lichess.org/@/".$_REQUEST['ulichess'];   
      
    if(sizeof($errors) == 0){
      updateStudent($_REQUEST['ufname'], $_REQUEST['ulname'], $_REQUEST['uemail'], $_REQUEST['uphone'], $_REQUEST['urating'], $lichesslink, $_REQUEST['studentId']);                                                                    
      header("location:? studentId={$_REQUEST['studentId']}");    
      exit();                                                                
    }  
  }    

    if(isset($_REQUEST['changeCreditsSubmitted'])){
     
      if($_REQUEST['hiddenButtonName'] == 'Add'){                                                                  //Since I'm using the same form to add and subtract credits
          insertCredit($_REQUEST['camount'], $_REQUEST['studentId']);                                         //I set a hidden value that will indicate whether add or subtract was clicked
      }  

      else if($_REQUEST['hiddenButtonName'] == 'Subtract'){
        insertRefund($_REQUEST['camount'], $_REQUEST['studentId']);                                          //Comments about why I'm inserting to a refund table are in the function definition
      }     
                                  
      header("location:? studentId={$_REQUEST['studentId']}");                                              //Passing the id when reloading the page after inserting                   
      exit();  
    }

    if(isset($_REQUEST['AddClassesSubmitted'])){ 
      $date = formatDate($_REQUEST['classDate']." ".$_REQUEST['classTime'], 'Y/m/d H:i:s');
      insertClass($_REQUEST['ctype'], $_REQUEST['czoomLink'], $date, $_REQUEST['studentId']);                           
      header("location:? studentId={$_REQUEST['studentId']}");  
      exit();                           
    } 

    if(isset($_REQUEST['EditClassesSubmitted'])){    
      $date = formatDate($_REQUEST['classDate']." ".$_REQUEST['classTime'], 'Y/m/d H:i:s');
      updateClass($_REQUEST['classId'], $_REQUEST['ctype'], $_REQUEST['czoomLink'], $date);                                                                    
      header("location:? studentId={$_REQUEST['studentId']}");    
      exit(); 
    }    

    if(isset($_REQUEST['studentDeleted'])){
     
      deleteStudent($_REQUEST['studentId']);                                                                    
      header("location:/admin/list_students.php"); 
      exit();      
    } 

    if(isset($_REQUEST['classDeleted'])){   
      deleteClass($_REQUEST['classId']);                                                                    
      header("location:? studentId={$_REQUEST['studentId']}");   
      exit();       
    } 

    $title = 'Student Profile';
    echoHeader($title);
    echoPageLayout($title, '', $admin);

    $studentId = $_REQUEST['studentId'];                               
    $student = getOneStudent($studentId);
    
    echoProfileInfo($student, 'bishop');                                                                     //will handle profiles pictures later
     
    $credits = calcStudentRemainingCredits($studentId);                                                          
    echoAddClassAndAddCreditsButtons($credits);
    
    //here the strategy is to get an array with all the classes the student has and then calc the 
    //future and past classes on the fly and echo them
    echo"<div class='flex-container-classesInfo'>";            

        echoPrivateNotes($student['PrivateNotes'], $studentId );
        echoPublicNotes($student['PublicNotes'], $studentId);

        $studentClassess = getIndexByPKArray(getOneStudentClasses($studentId), 'ClassId');

        $studentFutureClasses = calcFutureClasses($studentClassess);
        echoFutureClassesInfo($studentFutureClasses, 'Classes Booked');    
        
        $studentPastClasses = calcPastClasses($studentClassess);
        echoPastClassesInfo($studentPastClasses, 'Recent Classes');

       
    echo"</div>";       
           
    //Now I call the calcTotalClasses to calc the student total. I tried to make the 
    //function generic so depending on the format we pass the function will calc the total we want    
    $totalClasses = [];
    $totalClasses['MonthTotal'] = calcTotalClasses($studentClassess, 'Y/m');   
    $totalClasses['YearTotal'] = calcTotalClasses($studentClassess, 'Y');
    echoTotalClassesSection($totalClasses);   
      
    classForm($admin['DefaultZoomLink']);
    creditsForm();
    deleteStudentForm();
    studentForm();
    deleteClassForm();
}

$jsFiles = "
        <script src='/include/JS/helper_functions.js'></script> 
        <script src='/include/JS/common_forms.js'></script>
        <script src='/include/JS/student_profile.js'></script>
    ";

echoFooter($jsFiles); 




