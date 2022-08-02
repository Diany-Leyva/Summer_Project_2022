<?php
include('../include/initialize.php'); 

if(isset($_GET['StudentIdToEdit'])){
    $studentId = $_GET['StudentIdToEdit'];

    echo json_encode(getOneStudent($studentId));
} 
