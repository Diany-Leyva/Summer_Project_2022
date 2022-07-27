<?php
include('../include/initialize.php'); 
checkLogout();

if ($_SERVER["REQUEST_METHOD"] == "POST") {    

    if(isset($_REQUEST['loginSubmitted'])){

        $admin = checkIfAdminLoginIsValid($_REQUEST['userEmail'], $_REQUEST['userPassword']);

        if($admin){      
            $_SESSION['IsAdmin'] = true;        
            header("location:index.php");
            exit();
        }

        //Self-Note: Conversation with tyler about email and passw. We do not check for that in the front end because then that information 
        //its accessible, we only check for this in the back end. Change this and review it in other ocassions when I do that
        else {
            header("location:index.php");
            exit();  
        }   
    } 
}

echo "<html>                                                                                                      
<head>              
    <title>Login</title>  
    <link href='loginPage_style.css' rel='stylesheet'>
</head> "; 

loginForm();

$jsFiles = "
    <script src='/include/login.js'></script>
    ";

echoFooter($jsFiles); 