<?php
include('../include/initialize.php'); 

$adminInfo = array('FirstName'=>'Yuniesky', 'LastName'=> 'Quesada', 'Email'=> 'yuniesky3184@yahoo.com', 'Password'=> '123');
    
echo "<html>                                                                                                      
<head>              
    <title>Login</title>  
    <link href='loginPage_style.css' rel='stylesheet'>
</head> "; 

loginForm($adminInfo);
echoLoginJSFiles();
echoFooter(); 
