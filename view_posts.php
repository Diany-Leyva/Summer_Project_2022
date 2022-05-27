<?php
include('include/initialize.php');  

$allPosts= getAllBlogPosts();  
$post = getPost($_REQUEST['id']);

echoHeader($post ['Tittle'], 'image', 'Blog');

echo"<div >  
       <h2>".$post['Heading']. "<span style= 'color: #AF766E; '>" .$post['Tittle']. "</span><br/></h2>
           <p class='blogs'>".$post['Content']. "</p>";               
         
        //    echo "Page id: $id";
echoFooter();


