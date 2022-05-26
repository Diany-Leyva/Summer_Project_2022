<?php
include('include/initialize.php');   
     echoHeader('Diany Leyva', 'circle', 'Profile_Photo');
echo"<h1>";    
        echoHeading("Hello, I'm", "Diany");        
echo"        <span style='font-size: 30px ; font-weight: normal;'>
                I'm currently a senior at Webster University  <br/>
                studying Computer Science.  <br/> 
                I'm a passionate and people-oriented software developer <br/>
                who faces every challenge with diligence <br/>
                and perseverance to find efficient solutions.  <br/>
            </span>";

        getLink('about_me.php', 'button', 'About Me');
echo"</h1> 

     <section class='container1'>
        <h2>Blog</h2>
        <h2>Resume</h2>
        <h2>Projects</h2>
    </section>

    <section class='container2'>";
         echoCHildWithImage('Blog.php', 'Blog');
         echoCHildWithImage('Dianelys_Leyva_Resume.PDF', 'Resume');
         echoCHildWithImage('Projects.php', 'Projects');
echo"</section>";
   
//              <footer></footer>                            
//       </body>    
// </html>

