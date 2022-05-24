<?php






include("include/initialize.php");             
$result = dbQuery("SHOW TABLES")->fetchALL();

var_dump($result);