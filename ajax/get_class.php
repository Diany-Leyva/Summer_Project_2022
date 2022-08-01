<?php
include('../include/initialize.php'); 

if(isset($_GET['ClassIdToEdit'])){
    $classId = $_GET['ClassIdToEdit'];

    echo json_encode(getOneClass($classId));
} 