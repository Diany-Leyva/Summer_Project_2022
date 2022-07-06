<?php
include('../include/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_REQUEST['AddStudentSubmitted'])){

        $errors = [];
        validateName($_REQUEST['ufname']);
        validateName($_REQUEST['ulname']); 
        
       if(sizeof($errors) == 0){
            insertStudent($_REQUEST['ufname'], $_REQUEST['ulname'], $_REQUEST['uemail'], $_REQUEST['uphone'], $_REQUEST['urating']);                                                                    
            header("location:?");  
            exit();                                                                    
       }   
       
       else{
       //debug($errors);                                                                        //This is just to try I will display correct message in the form
       }
    }  
}

$allStudents = getAllStudents(); 
echoPageLayout('Students', 'My Students', "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List"); 
echoAddStudentButton('Add Student');  

if(!empty($allStudents)){   

    addRemainingCredits($allStudents);                                                         //These functions will the info needed to the students array      
    addFutureClassesAmount($allStudents);           
    addDaysToNextClass($allStudents);             

    echoStudentTable($allStudents);       
}                                                        
               
else{
    echo"No students to show";                                                                       //This will be used properly later on(e.g. showing the correct message etc)
} 

createNewStudentForm();
echoFooter();    
         
