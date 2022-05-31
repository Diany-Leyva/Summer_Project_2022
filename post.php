<?php
include('include/initialize.php'); 

     echoHeader('Blog', 'image', 'a');


    $topicId = $_REQUEST['id'] ;
     $topic = getTopic($topicId);
     $allPostsbyTopic= getAllPostsbyTopic($topicId);
          
     echo"<div >  
        <ul class='a'>
            <h2>";          
          
            echoHeadingTwoColors($topic['Heading']);
        echo "</h2>
            <div class= 'list1'>";           
          
            foreach($allPostsbyTopic as $postByTopic) {
              passVariableThroughLink('view_posts.php', $postByTopic['Post_Id'], 'buttons2', $postByTopic['Tittle']);               
              }
                          
  echo "    </div>         
        </u>";
        
echoFooter();
    
