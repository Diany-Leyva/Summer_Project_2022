<?php
include('include/initialize.php'); 

     echoHeader('Blog', 'image', 'a');

     $allPosts= getAllPosts();   
          
     echo"<div >  
        <ul class='a'>
            <h2>";

            $headingArray = array("Here is my", "Blog");

            echoHeading($headingArray[0], $headingArray[1]);
        echo "</h2>
            <div class= 'list1'>";           
          
            foreach($allPosts as $post) {
              passVariableOnLink('view_posts.php', $post['Post_Id'], 'buttons2', $post['Tittle']);
                echo "<li><a href='view_posts.php?id=$post[Post_Id]' class='buttons2'>  </a></li>";        
              }
                          
  echo "    </div>         
        </u>";
        
echoFooter();
    
