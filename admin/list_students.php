<?php
include('../include/initialize.php');                
$allStudents = getAllStudents();
// debug($allStudents);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_REQUEST['AddStudentSubmitted'])){   
        $errors = [];
        validateName($_REQUEST['ufname']);
        validateName($_REQUEST['ulname']); 
        
       if(sizeof($errors) == 0){
            insertStudent($_REQUEST['ufname'], $_REQUEST['ulname'], $_REQUEST['uemail'], $_REQUEST['uphone'], $_REQUEST['urating'], $_REQUEST['ulichess']);                                                                    
            header("location:?"); 
            exit();                                                                     
       }   
       
       else{
       //debug($errors);                                                                        //This is just to try I will display correct message in the form
       }
    }  

    if(isset($_REQUEST['studentDeleted'])){
        deleteStudent($_REQUEST['stdId']);                                                                    
        header("location:?");  
        exit();                                                             
    }  
}
 
echoPageLayout('Students', 'My Students', "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List"); 
echoAddStudentButton('Add Student');  

if(!empty($allStudents)){
    
    $remainingCredits = calcRemainingCredits();
    $allStudents = addRemainingCredits($remainingCredits, $allStudents);                                                         //These functions will the info needed to the students array      
    $futureClassesAmount = getFutureClassesAmount();
    $allStudents = addFutureClassesAmount($futureClassesAmount, $allStudents);           
    $allStudents = addDaysToNextClass($allStudents);             

    echoStudentTable($allStudents);       
}                                                        
               
else{
    echo"No students to show";                                                                       //This will be used properly later on(e.g. showing the correct message etc)
}

addStudentForm();
deleteStudentForm();
echoFooter();    
         
