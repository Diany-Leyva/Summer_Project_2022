<?php
include('../include/initialize.php');  
echoHeader('Students');
echoVerticalBar();

$allStudents = getAllStudents(); 
echoHorizontalBar("My Students", "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List"); 
addButtons('Add Student');                                                           

if(!isEmpty($allStudents)){ 

    $remainingCredits = [];                                                                       //These arrays will be passed by reference to be updated
    $classesBookedAmount = [];
    $daysToNextCLass = [];
    
    calculateStudentTable($allStudents, $remainingCredits, $classesBookedAmount, $daysToNextCLass);         
    echoStudentTable($allStudents, $remainingCredits, $classesBookedAmount, $daysToNextCLass);       
}                                                        
               
else{
    echo"No students to show";                                                                   //This will be used properly later on(e.g. showing the correct message etc)
}                                        


echoFooter();    
         


