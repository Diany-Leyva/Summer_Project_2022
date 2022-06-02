<?php

include_once('include/initialize.php');
echoHeader('Comments');
// echoBackgroundImageHeader('pagesHeader');

$errors = [];

echo"
    <h1 class = 'reply'>
    ";  
  
    echoHeadingTwoColors('Leave a reply');

echo"
    </h1>
    <h3>Your email address will not be published. Required fields are marked *<br>
    <p class = 'areacomment'>Comment</p>
    <textarea ></textarea>
    ";

createCommentsForm();
echoFooter();









