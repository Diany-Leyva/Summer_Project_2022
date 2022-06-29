<?php
include('../include/initialize.php');

//Might add function to do this
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_REQUEST['AddStudentSubmitted'])){

        $errors = [];
        validateName($_REQUEST['ufname']);
        validateName($_REQUEST['ulname']); 
        
       if(sizeof($errors) == 0){
            updatestudents_TableDB();                                                                    
            header("location:?");                                                                      
       }   
       
       else{
      //  debugOutput($errors);                                                                        //This is just to try I will display correct message in the form
       }
    }  
}

$allStudents = getAllStudents(); 
echoPageLayout('Students', 'My Students', "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List"); 
echoAddStudentButton('Add Student');  

if(!empty($allStudents)){     

    addRemainingCredits($allStudents);            
    addFutureClassesAmount($allStudents);           
    addDaysToNextClass($allStudents);             

    echoStudentTable($allStudents);       
}                                                        
               
else{
    echo"No students to show";                                                                       //This will be used properly later on(e.g. showing the correct message etc)
} 

createNewStudentForm();
echoFooter();    
         
