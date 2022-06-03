<?php

include_once('include/initialize.php');

// echoBackgroundImageHeader('pagesHeader');

$errors = [];

if(isset($_REQUEST['CommentsFormPostComment'])){    
   
    validateContent($errors);
    validateName($errors);
    validateEmail($errors);

    if(sizeof($errors) == 0){
        updateUser_TableDB();                                           
        $userId = getNewUserId($_REQUEST['Name'], $_REQUEST['Email']);
        updateComments_TableDB($userId);                                  
        
        header("location:?");                                           
    }    
}

debugOutput($errors);
createCommentsForm();










