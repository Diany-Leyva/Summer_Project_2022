<?php

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

function getLastWord($string){
    $pieces = explode(' ', $string);
    $last_word = array_pop($pieces);
    return $last_word;
}


function removeLastWord($heading){
    $lastWord = getLastWord($heading);  
    return str_replace($lastWord, '', $heading);     
} 

function AddCommentsForm(){

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
}
