<?php

function debugOutput($input){
    echo "<pre>";
    var_dump($input);
    echo "</pre>";
}

function substring($string, $start, $length = null)
{
	return mb_substr($string, $start, $length, 'UTF-8');
}