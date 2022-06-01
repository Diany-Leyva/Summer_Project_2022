<?php
include('include/initialize.php'); 

$topicId = $_REQUEST['id'] ;
$topic = getTopic($topicId);
$allPostsbyTopic= getAllPostsbyTopic($topicId);        

echoHeader($topic['Tittle']);
echoBackgroundImageHeader('pagesHeader');
      
echo"<h2>";          
       echoHeadingTwoColors($topic['Heading']);
echo"</h2>
   
<div class=squareBackground2>
     <div class= 'list1'> 
          <ul class='a'>";  
              foreach($allPostsbyTopic as $postByTopic) {
                    passVariableThroughLink('view_posts.php', $postByTopic['Post_Id'], 'buttons2', $postByTopic['Tittle']);               
             }
                                       
echo"     </u>
     </div>         
</div>";
        
echoFooter();
    