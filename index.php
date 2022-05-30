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

     <div class='container1'>
        <h2>Blog</h2>
        <h2>About Me</h2>
        <h2>Projects</h2>
    </div>

    <div class='container2'>";

    $allTopics = getAllTopics();

    

         echoCHildWithImage('Blog.php', 'Blog');
         echoCHildWithImage('About_Me.php', 'About Me');
         echoCHildWithImage('Projects.php', 'Projects');   
echoFooter();