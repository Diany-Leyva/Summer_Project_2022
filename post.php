<?php
include('include/initialize.php'); 

$topicId = $_REQUEST['id'] ;
$topic = getTopic($topicId);
$allPostsbyTopic= getAllPostsbyTopic($topicId);
          
echoHeader($topic['Tittle'], 'image', 'a');
      
echo"<h2>";          
       echoHeadingTwoColors($topic['Heading']);
echo"</h2>
   
     <div class= 'list1'> 
          <ul class='a'>";  
              foreach($allPostsbyTopic as $postByTopic) {
                    passVariableThroughLink('view_posts.php', $postByTopic['Post_Id'], 'buttons2', $postByTopic['Tittle']);               
             }
                                       
echo"     </u>         
     </div>";
        
echoFooter();
    
