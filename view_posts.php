<?php
include('include/initialize.php');  

$post = getPost($_REQUEST['id']);

echoHeader($post ['Tittle'], 'image', 'Blog');

echo"<h2>";
    echoHeadingTwoColors($post['Heading']);
echo"</h2>

     <p class='blogs'>".$post['Content']. "</p>";               
         
echoFooter();