<?php

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

function updateNewsletter_Subscriber_TableDB(){
    dbQuery("
    INSERT INTO newsletter_subscriber(Name, Email)
    VALUES ('$_REQUEST[Name]', '$_REQUEST[Email]' )
");
}


// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// function validateName(&$errors){

//     if(!isset($_REQUEST['Name']) || $_REQUEST['Name'] == ''){
//         $errors['Name'] = 'Required';
//     }

//     $name = test_input($_REQUEST['Name']);

//     if (!preg_match('/^[a-zA-Z- ]*$/',$name)) {
//         $errors['Name'] = "Only letters and white space allowed";
//     }
// }

// function validateEmail(&$errors){

//     if(!isset($_REQUEST['Email']) || $_REQUEST['Email'] == ''){
//         $errors['Email'] = 'Required';
//     }   

//     else if (!filter_var(test_input($_REQUEST["Email"]), FILTER_VALIDATE_EMAIL)) {
//         $errors['Email'] = "Invalid email format";
//     }
// }


