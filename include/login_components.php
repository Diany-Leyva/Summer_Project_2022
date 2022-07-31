<?php

// ********************************************************************************************************************************
//This will a query from a DB in the future but we have it in an array for now
// ********************************************************************************************************************************

function checkIfAdminLoginIsValid($email, $password){

    $admins = getIndexByPKArray(getAllAdmins(), 'AdminId');
    $checkAdmin = '';
   
   //when a admin registers (or a user) I will check in the DB to make 
   //sure than the email is unique, therefore the email/password combination will
   //be unique. So the condition that creates a SESSION can only be reached
   //once since there won't be duplicates emails in the admin table. 
   //I want my loop to stop once the correct combination is found. 

  //If the email is in the array then check for the correct passwrod
   if(in_array($email, array_column($admins, 'Email'))){ 

      foreach($admins as $adminInfo){               
        
          if($adminInfo['Email'] == $email &&
          $adminInfo['Password'] == $password){

          $checkAdmin = $adminInfo['AdminId']; 
          $_SESSION['AdminId'] = $adminInfo['AdminId']; 
          break;
        }    
          
        else if($adminInfo['Password'] != $password){
          
          $checkAdmin = 'Incorrect Password';
        }
      }  
  }   

  else{
    $checkAdmin = 'Incorrect Email';
  }
        
  return $checkAdmin;	
}

// ********************************************************************************************************************************

//This is a self-note: I will come back here and see if i need to clean the elements in this array using htmlspecialchars() 
function loginForm(){    
    
    echo"
    <div id='loginForm' class='center'>
      <h1>Login</h1>
      <form onsubmit='return false;'>
        <div class='txtField'>
          <input type='email' name='userEmail' id='userEmail' required>          
          <span></span>
          <label for='userEmail'>Email</label>
        </div>
        <p class='emailErr' id='emailErr'>Error message goes here</p>

        <div class='txtField'>
          <input type='password' name='userPassword' id='userPassw' required>
          <span></span>
          <label for='userPassword'>Password</label>
        </div>
        <p class='passwErr' id='passwErr'>Error message goes here</p>
       
        <div class='pass'>Forgot Password?</div>
        <input type='submit' value='Login' name='loginSubmitted'>
        <div class='signup_link'>
          Not a user? <a href='#'>Signup</a>
        </div>         
      </form>
    </div>
    ";     
}

// ********************************************************************************************************************************