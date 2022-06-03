<?php

include_once('include/initialize.php');

// echoBackgroundImageHeader('pagesHeader');

$errors = [];

if(isset($_REQUEST['CommentsFormPostComment'])){    
   
    if(sizeof($errors) == 0){
        // updateComments_TableDB();                           //Here we are storing in the database what is written in the URL
        header("location:?");                                            // this is to redirect to the same page (always do it before an echo)
    }    
}

echoHeader('Comments');
debugOutput($errors);
createCommentsForm();
echoFooter();









