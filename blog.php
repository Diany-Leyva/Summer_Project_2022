<?php
include('include/initialize.php');   
     echoPagesHeader('Blog', 'image', 'Blog');

     $allPosts= getAllBlogPosts();   
          
     echo"<div >  
        <ul class='a'>
            <h2>Here is my <span style= 'color: #AF766E; '>Blog:</span><br/></h2>
            <div class= 'list1'>";  
            
            foreach($allPosts as $index => $post) {
                echo "<li><a href='view_posts.php?id=$index' class='buttons2'>".$post['tittle']."</a></li>";        
              }
                          
  echo "    </div>         
        </u>";
        
echoFooter();
    
