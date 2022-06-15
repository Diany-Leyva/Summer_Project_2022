<?php
include('../include/initialize.php');  

echoHeader('Students', getStudentsNumber()['number']);
echoSearchBar();

$allStudents = getAllStudents();

if(!isEmpty($allStudents)){ 
    echoTable($allStudents);       
}                                                           
                    
else{
    echo"No students to show";              //This will be used properly later on(e.g. showing the correct message etc)
}                                                 
 

echoVerticalBar();
echoFooter();      
           
   
        
        
         
        
        
        
        
        
        
        
        
        
        
        
        





                        
             