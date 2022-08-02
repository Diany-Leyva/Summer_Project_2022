<?php
include('../include/initialize.php'); 

if(isset($_POST['SavePublicNotes'])){

    $commments = json_decode($_POST['SavePublicNotes'], true);
    $studentId = $commments['StudentId'];
    $notes = $commments['Notes'];

    updatePublicNotes($studentId, $notes);      
}
