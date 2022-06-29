<?php
include('../include/initialize.php');  

$tittle = 'Index';
echoPageLayout($tittle, $tittle, '');

$allStudents = getAllStudents(); 

debug($allStudents);
calcRemainingCredits($allStudents);            //Add a credits key to the array od students with the remaining credits they have 
debug($allStudents);


echoFooter();

