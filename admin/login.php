<?php
include('../include/initialize.php'); 
logout();

if ($_SERVER["REQUEST_METHOD"] == "POST") {    

    if(isset($_REQUEST['loginSubmitted'])){

        $admin = checkIfAdminLoginIsValid($_REQUEST['userEmail'], $_REQUEST['userPassword']);

        if($admin){      
            $_SESSION['IsAdmin'] = true;        
            header("location:index.php");
            exit();
        }

        // I wonder if I need to show a message here or something. So far I'm just reloading the page
        else {
            header("location:?"); 
            exit();  
        }   
    } 
}

echo "<html>                                                                                                      
<head>              
    <title>Login</title>  
    <link href='loginPage_style.css' rel='stylesheet'>
</head> "; 

loginForm(getAdmin());

$jsFiles = "
    <script src='/include/login.js'></script>
    ";

echoFooter($jsFiles); 