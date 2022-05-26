<?php
include('include/initialize.php');  

$allPosts= getAllPosts();
var_dump($allPosts);

foreach()





echoPagesHeader($allPosts['tittle'], 'image', 'Blog');

echo"<div >  

        <h2>The world of <span style= "color: #AF766E; ">Dance</span><br/></h2>
           <p class='blogs'>Dance is a performing art form consisting of sequences of movement, either improvised <br>
           or purposefully selected. This movement has aesthetic and often symbolic value. <br>
           Dance can be categorized and described by its choreography, by its repertoire of movements, <br>
           or by its historical period or place of origin.</p>
                    
            
                      
        </div>        
         
       
    </body>  

</html>



echoFooter();