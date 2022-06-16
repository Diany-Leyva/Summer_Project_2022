<?php
include('../include/initialize.php');  

echoHeader('Students', getStudentsNumber()['number']);
echoSearchBar();

$allStudents = getAllStudents();                                             //gets all students information
$studentWithCredits = getStudentsCredits();                                  //gets the students and the credits total
$studentWithClasses = getStudentsClasses();

if(!isEmpty($allStudents)){      
    $credits = calculateStudentInfo($studentWithCredits, sizeof($allStudents), 'Credits');
    $classes = calculateStudentInfo($studentWithClasses, sizeof($allStudents), 'Classes');     
    echoTable($allStudents, $credits, $classes);       
}                                                           
                    
else{
    echo"No students to show";                                                 //This will be used properly later on(e.g. showing the correct message etc)
}                                             
 
echoVerticalBar();
echoFooter();      
           
   
        

 