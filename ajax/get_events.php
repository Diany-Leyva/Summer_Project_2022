<?php
include('../include/initialize.php'); 

if(isset($_GET['Events'])){
    
    echo json_encode(getEvents());
} 