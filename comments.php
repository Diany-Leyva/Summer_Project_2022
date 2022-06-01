<?php

include_once('include/initialize.php');
echoHeader('Comments');
// echoBackgroundImageHeader('pagesHeader');

$errors = [];
?>

<html>

<h1 class = 'reply'>Leave a reply</h1>
<!-- echoHeadingTwoColors('Leave a reply') -->
<h3>Your email address will not be published. Required fields are marked *<br>
<p class = 'areacomment'>Comment</p>
<textarea ></textarea>

<form action='' method = 'post'>                                       
Name: <input type= 'text' name='Name' />
<br> </br>
Email: <input type= 'text' name='Email' />
        <br> </br>
        <input type= 'submit' name='NewsletterFormSubmit'/>
        </form> 



</html>





