<?php
include('include/initialize.php');   
echoHeader('Diany Leyva');
echoCircleImage('circle', 'Profile_Photo');
echo"<h1>";    
          echoHeadingTwoColors("Hello, I'm Diany");        
echo"          <span style='font-size: 30px ; font-weight: normal;'>
                I'm currently a senior at Webster University  <br/>
                studying Computer Science.  <br/> 
                I'm a passionate and people-oriented software developer <br/>
                who faces every challenge with diligence <br/>
                and perseverance to find efficient solutions.  <br/>
               </span>";
               getLink('Dianelys_Leyva_Resume.PDF', 'button', 'Resume');
echo"</h1>
     
          <div class=squareBackground2>
               <div class='container1'>";

                    $allTopics = getAllTopics();

                    foreach($allTopics as $topic){
                          echo "<h2>".$topic['Tittle']."</h2>";
            }

          echo"</div>
     
          <div class='container2'>";

          foreach($allTopics as $topic){                                                 //passing index from topics array to post page
               echoCHildWithImage('post.php', $topic['Topic_Id'], $topic['Tittle']);
          }
echo"     </div>
       </div>";

echoFooter();