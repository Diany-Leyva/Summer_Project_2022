<?php
include('include/initialize.php');  

$allPosts= getAllBlogPosts();  
$post = getPost($_REQUEST['id']);

echoPagesHeader($post ['Tittle'], 'image', 'Blog');

echo"<div >  
       <h2>".$post['Heading1']. "<span style= 'color: #AF766E; '>" .$post['Heading2']. "</span><br/></h2>
           <p class='blogs'>".$post['Content']. "</p>";               
         
        //    echo "Page id: $id";
echoFooter();