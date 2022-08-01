<?php
include('../include/initialize.php'); 
checkLogout();

echo "<html>                                                                                                      
<head>              
    <title>Login</title>  
    <link href='loginPage_style.css' rel='stylesheet'>
</head> "; 

loginForm();

$jsFiles = "
    <script src='/include/JS/login.js'></script>
    ";

echoFooter($jsFiles); 