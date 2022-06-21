<?php

include_once("include/initialize.php");

$errors = [];

if(isset($_REQUEST['NewsletterFormSubmit'])){

    validateName($errors);
    validateEmail($errors);

    if(sizeof($errors) == 0){
        updateNewsletter_Subscriber_TableDB();                           //Here we are storing in the database what is written in the URL
        header("location:?");                                            // this is to redirect to the same page (always do it before an echo)
    }    
}

echoHeader('Newsletter', 'image', 'toBeChanged');
debugOutput($errors);
createNewsletterForm();
echoFooter(); 