<?php

include_once("include/initialize.php");

$errors = [];


//REQUEST is a variable that always exits it is how your submit content to the page, which content to submit, what the data is
// if the info submitted
if(isset($_REQUEST['NewsletterFormSubmit'])){

    validateName($errors);
    validateEmail($errors);

    if(sizeof($errors) == 0){
        //Here we are storing in the database what is written in the URL
        updateNewsletter_Subscriber_TableDB();

    // this is to redirect to the same page (always do it before an echo)
     header("location:?"); 
    }      
      
}

// echo sizeof($errors);
echoHeader('Newsletter', 'image', 'a');

// var_dump($errors);
debugOutput($errors);


// $_REQUEST[] = "hkjchkjchk";

//Here we are storing in the database what is written in the URL
// dbQuery("
//     INSERT INTO newsletter_subscriber(Name, Email)
//     VALUES ('$_REQUEST[Name]', '$_REQUEST[Email]' )
// ");

//variable that always exits it is how your submit content to the page, which content to submit, what the data is
// debugOutput($_REQUEST);


// Pretty much every form will be a post, if I put the get the information will be seen in the url
//action is to submit the information to a different page  


createNewsletterForm();






echoFooter();