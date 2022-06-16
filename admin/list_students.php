<?php
include('../include/initialize.php');  

echoHeader('Students', getStudentsNumber()['number']);
echoSearchBar();

$allStudents = getAllStudents();                                             //gets all students information
$studentWithCredits = getStudentsCredits();                                  //gets the students and the credits total

if(!isEmpty($allStudents)){      
    $credits = calculateCredits($studentWithCredits, sizeof($allStudents));
    echoTable($allStudents, $credits);       
}                                                           
                    
else{
    echo"No students to show";                                                 //This will be used properly later on(e.g. showing the correct message etc)
}                                             
 
echoVerticalBar();
echoFooter();      
           
   
        
        
         
 