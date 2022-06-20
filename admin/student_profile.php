<?php
include('../include/initialize.php');
$tittle = "Student's Profile";

echoHeader($tittle); 
echoVerticalBar();
echoHorizontalBar($tittle, "");

$studentId = $_REQUEST['id'];                                //Need to work on what if the id is not passed to request, what message or behavior the page will have? 
$student = getStudent($studentId);

if(!isEmpty($student)){     
    echoProfileInfo($student, 'bishop');                    //will handle profiles pictures later
}                                                        
               
else{
    echo"No student!";                                      //This will be used properly later on(e.g. showing the correct message etc)
}           


echoFormButtons($credits);
echoClassesInfo();
echoTotalClassesSection();
echoFooter();    
         