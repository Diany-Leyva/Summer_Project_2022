<?php
include('include/initialize.php');  

$allPosts= getAllBlogPosts();  
$id = $_REQUEST['id'];

echoPagesHeader($allPosts[$id]['tittle'], 'image', 'Blog');

echo"<div >  
       <h2>".$allPosts[$id]['heading1']. "<span style= 'color: #AF766E; '>" .$allPosts[$id]['heading2']. "</span><br/></h2>
           <p class='blogs'>".$allPosts[$id]['content']. "</p>";               
         
           echo "Page id: $id";
echoFooter();