<?php
include('include/initialize.php');   
     echoHeader('Diany Leyva', 'circle', 'Profile_Photo');

// debugOutput('jkdhkldjjdhdkhh'->'hdkjdhkjd');
// exit;

$headingArray = array("Hello, I'm", "Diany");

echo"<h1>";    
        echoHeading($headingArray[0], $headingArray[1]);        
echo"        <span style='font-size: 30px ; font-weight: normal;'>
                I'm currently a senior at Webster University  <br/>
                studying Computer Science.  <br/> 
                I'm a passionate and people-oriented software developer <br/>
                who faces every challenge with diligence <br/>
                and perseverance to find efficient solutions.  <br/>
            </span>";

        getLink('Dianelys_Leyva_Resume.PDF', 'button', 'Resume');
echo"</h1>
     <div class='container1'>";

     $allTopics = getAllTopics();

     // debugOutput($allTopics);

     foreach($allTopics as $topic){
          echo "<h2>".$topic['Tittle']."</h2>";
     }

     echo "</div>
    <div class='container2'>";

foreach($allTopics as $topic){
     // debugOutput($topic['Topic_Id']);
     echoCHildWithImage('post.php', $topic['Topic_Id'], $topic['Tittle']);
}

echoFooter();