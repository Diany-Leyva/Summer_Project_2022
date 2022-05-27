<?php
include('include/initialize.php');  

$allPosts= getAllBlogPosts();  
$post = getPost($_REQUEST['id']);

echoHeader($post ['tittle'], 'image', 'Blog');

echo"<div >  
       <h2>".$post['heading1']. "<span style= 'color: #AF766E; '>" .$post['heading2']. "</span><br/></h2>
           <p class='blogs'>".$post['content']. "</p>";             
                
echoFooter();