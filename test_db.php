<?php

include("include/connect.php");

$result = dbQuery("SHOW TABLES")->fetchALL();

var_dump($result);