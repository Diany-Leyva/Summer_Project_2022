<?php

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

// function substring($string, $start, $length = null)
// {
// 	return mb_substr($string, $start, $length, 'UTF-8');
// }

function getLastWord($string)
    {
        $pieces = explode(' ', $string);
        $last_word = array_pop($pieces);
        return $last_word;
    }


    function removeLastWord($heading)
    {
        $lastWord = getLastWord($heading);  
        return str_replace($lastWord, '', $heading);     
    }
 