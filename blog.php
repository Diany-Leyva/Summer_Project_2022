<?php
include('include/initialize.php'); 

     echoHeader('Blog', 'image', 'a');

     $topic = getTopic($_REQUEST['id']);

    // debugOutput($topic);

    $allTopics = [];

    if($topic['Tittle'] == 'Blog'){
      $allTopics= getAllBlogPosts();   
    }

    else if($topic['Tittle'] == 'About Me'){
      $allTopics= getAllAboutMePosts();  
    }

    else if($topic['Tittle'] == 'Projects'){
      $allTopics= getAllProjects();  
    }  
          
     echo"<div >  
        <ul class='a'>
            <h2>";

            $headingArray = array("Here is my", "Blog");

            echoHeading($headingArray[0], $headingArray[1]);
        echo "</h2>
            <div class= 'list1'>";           
          
            foreach($allTopics as $Onetopic) {
              passVariableThroughLink('view_posts.php', $Onetopic['Post_Id'], 'buttons2', $Onetopic['Tittle']);
              // echo "<li><a href='view_posts.php?id=$post[Post_Id]' class='buttons2'> $post[Tittle] </a></li>";     
              }
                          
  echo "    </div>         
        </u>";
        
echoFooter();
    