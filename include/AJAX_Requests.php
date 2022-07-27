<?php
include('../include/initialize.php'); 

//I'm planning to send all my AJAX requests to this file from now as I get more familiar with the concept. Is this ok?
//How do you usually do this?

if(isset($_GET['StudentIdToEdit'])){
    $studentId = $_GET['StudentIdToEdit'];

    echo json_encode(getOneStudent($studentId));
} 

if(isset($_POST['SavePrivateNotes'])){

    $commments = json_decode($_POST['SavePrivateNotes']);
    $studentId = $commments->StudentId;
    $notes = $commments->Notes;

    updatePrivateNotes($studentId, $notes);      
} 

if(isset($_POST['SavePublicNotes'])){

    //I'm receiving here here a tupe of what it looks like a string and I need it to 
    //work with the object, so I'm just decoding it to acces the information
    $commments = json_decode($_POST['SavePublicNotes']);
    $studentId = $commments->StudentId;
    $notes = $commments->Notes;

    updatePublicNotes($studentId, $notes);      
} 