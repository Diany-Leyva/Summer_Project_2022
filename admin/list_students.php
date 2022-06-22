<?php
include('../include/initialize.php');  
echoHeader('Students');
echoVerticalBar();

$allStudents = getAllStudents(); 
echoHorizontalBar("My Students", "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List"); 
addButtons('Add Student');  

if(!empty($allStudents)){ 

    $remainingCredits =  $classesBookedAmount = $daysToNextCLass =  [];                                                                       
    
    calculateStudentTable($allStudents);         
    echoStudentTable($allStudents, $remainingCredits, $classesBookedAmount, $daysToNextCLass);       
}                                                        
               
else{
    echo"No students to show";                                                                       //This will be used properly later on(e.g. showing the correct message etc)
}    

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_REQUEST['AddStudentSubmitted'])){

        $errors = [];
        validateName($_REQUEST['ufname']);
        validateName($_REQUEST['ulname']); 
        
       if(sizeof($errors) == 0){
            updatestudents_TableDB();                                                                    
            header("location:?");                                                                      // this is to redirect to the same page 
       }   
       
       else{
      //  debugOutput($errors);                                                                        //This is just to try I will display correct message in the form
       }
    }  
  }

createNewStudentForm();
echoFooter();    
         
