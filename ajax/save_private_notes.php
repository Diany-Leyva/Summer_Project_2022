<?php
include('../include/initialize.php'); 

if(isset($_POST['SavePrivateNotes'])){

//Pssing true as second argument will return an array. if I don't pass this argument will return an object
$commments = json_decode($_POST['SavePrivateNotes'], true);
$studentId = $commments['StudentId'];
$notes = $commments['Notes'];

updatePrivateNotes($studentId, $notes);      
} 
