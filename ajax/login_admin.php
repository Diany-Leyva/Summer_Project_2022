<?php
include('../include/initialize.php'); 

if(isset($_POST['CheckAdmin'])){

    // Pssing true as second argument will return an array. if I don't pass this argument will return an object
    $input = json_decode($_POST['CheckAdmin'], true);   
   
    echo checkIfAdminLoginIsValid($input['Email'], $input['Password']); 
} 