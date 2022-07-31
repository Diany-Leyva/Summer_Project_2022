<?php
include('../include/initialize.php'); 

if(isset($_GET['CurrentTime'])){    
    echo json_encode(getCurrentTimeArray());
} 


