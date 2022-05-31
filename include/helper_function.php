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
 