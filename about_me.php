<?php
include('include/initialize.php'); 

     echoHeader('About Me', 'image', 'a');

     $allTopics= getAllTopics();   
          
     echo"<div >  
        <ul class='a'>
            <h2>";

            $headingArray = array("Here is iformation", "About Me");

            echoHeading($headingArray[0], $headingArray[1]);
        echo "</h2>
            <div class= 'list1'>";           
          
            foreach($allPosts as $post) {
              passVariableThroughLink('view_posts.php', $post['Post_Id'], 'buttons2', $post['Tittle']);
              // echo "<li><a href='view_posts.php?id=$post[Post_Id]' class='buttons2'> $post[Tittle] </a></li>";     
              }
                          
  echo "    </div>         
        </u>";
        
echoFooter();





<html>                                                                  
    <head>
        <title>About Me</title>  
        <link href="style.css" rel="stylesheet">                
    </head>
    <body>                
        <header><img class= 'image' src="a.jpg" alt="blog"></header>  
        <div >  
        <ul class="a">
            <h2>Here is information <span style= "color: #AF766E; ">About Me:</span><br/></h2>
            <div class= 'list1'>                   
                 <li><a href="dance.php" class="buttons2"> The beginning of a journey</a></li>
                 <li><a href="Motherhood.php" class="buttons2"> Why programming?</a></li>
                 <li><a href="Chess.php" class="buttons2"> Dancing or not dancing?</a></li>
                 <li><a href="Minimalism.php" class="buttons2"> Interests</a></li>
                 <li><a href="Healthy Lifestyle.php" class="buttons2">Hobbies</a></li>            
            </div>         
          </u>     
         
        </div>      
    </body> 
</html>
