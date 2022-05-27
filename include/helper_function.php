<?php

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

function updateDB(){
    dbQuery("
    INSERT INTO newsletter_subscriber(Name, Email)
    VALUES ('$_REQUEST[Name]', '$_REQUEST[Email]' )
");
}













// function substring($string, $start, $length = null)
// {
// 	return mb_substr($string, $start, $length, 'UTF-8');
// }

// function getLastWord($string)
//     {
//         $string = explode(' ', $string);
//         $last_word = array_pop($string);
//         return $last_word;
//     }