<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateName($name){

    $errors = [];    

    if (!preg_match('/^[a-zA-Z- ]*$/',$name)) {
        $errors['Name'] = "Only letters allowed";
    }

    return $errors;
}

// function validateEmail(&$errors){
//     if (!filter_var(test_input($_REQUEST["Email"]), FILTER_VALIDATE_EMAIL)) {
//         $errors['Email'] = "Invalid email format";
//     }
// }