<?php
include('../include/initialize.php'); 

//I'm planning to send all my AJAX requests to this file intead of having this on top of the database_files. Is this ok?
//It makes sense? How do you usually do this?

if(isset($_GET['StudentId'])){
    $studentId = $_GET['StudentId'];

    echo json_encode(getOneStudent($studentId));
} 