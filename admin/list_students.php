<?php
include('../include/initialize.php');  
echoHeader('Students');
echoVerticalBar();

$allStudents = getAllStudents(); 
echoHorizontalBar("My Students", "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List");                                                                

if(!isEmpty($allStudents)){ 

    $remainingCredits = [];                                                                       //These arrays will be passed by reference to be updated
    $classesBookedAmount = [];
    $days = [];
    
    calculateStudentTable($allStudents, $remainingCredits, $classesBookedAmount, $days);         
    echoTable($allStudents, $remainingCredits, $classesBookedAmount, $days);       
}                                                        
               
else{
    echo"No students to show";                                                                   //This will be used properly later on(e.g. showing the correct message etc)
}                                        


echoFooter();    
         


