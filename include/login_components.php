<?php

// ********************************************************************************************************************************

function echoLoginJSFiles(){
    echo"
        <script src='/include/login.js'></script> 
    ";
}

// ********************************************************************************************************************************
//This will a query from a DB in the future but we have it in an array for now
// ********************************************************************************************************************************

function checkIfAdminLoginIsValid($email, $password){

    $adminInfo = getAdmin();

   //I only have one admin so I wont loop trhought now. It might change in the future
    if($adminInfo['Email'] == $email &&
       $adminInfo['Password'] == $password ){
        return true;
    }

    return false;	
}

// ********************************************************************************************************************************

function loginForm($adminInfo){    
    
    echo"
    <div id='loginFormId' class='center'>
      <h1>Login</h1>
      <form action='' method='post'>
        <div class='txtField'>
          <input type='email' name='userEmail' id='userEmailId' required>          
          <span></span>
          <label for='userEmail'>Email</label>
        </div>
        <p class='emailErr' id='emailErr'>Error message goes here</p>

        <div class='txtField'>
          <input type='password' name='userPassword' id='userPasswId' required>
          <span></span>
          <label for='userPassword'>Password</label>
        </div>
        <p class='passwErr' id='passwErr'>Error message goes here</p>
       
        <div class='pass'>Forgot Password?</div>
        <input type='submit' value='Login' name='loginSubmitted'>
        <div class='signup_link'>
          Not a user? <a href='#'>Signup</a>
        </div>
        <input type='hidden' id='hiddenAdminInfoArray' value=";echo json_encode($adminInfo);echo">   
      </form>
    </div>
    ";     
}

// ********************************************************************************************************************************