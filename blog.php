<?php
include('include/initialize.php');   
     echoHeader('Blog', 'image', 'a');

     $allPosts= getAllBlogPosts();   
          
     echo"<div >  
        <ul class='a'>
            <h2>Here is my <span style= 'color: #AF766E; '>Blog:</span><br/></h2>
            <div class= 'list1'>";  
            
            foreach($allPosts as $post) {
                echo "<li><a href='view_posts.php?id=$post[PostId]' class='buttons2'> $post[Tittle] </a></li>";        
              }
                          
  echo "    </div>         
        </u>";
        
echoFooter();
    
