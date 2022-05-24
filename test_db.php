<?php

include("include/initialize.php");               //including the text from

$result = dbQuery("SHOW TABLES")->fetchALL();

var_dump($result);