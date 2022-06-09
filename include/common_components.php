<?php

function echoHeader($tittle){
    echo "<html>                                                                                                      
            <head>              
                <title>$tittle</title>  
                <link href='style.css' rel='stylesheet'>                                                          
            </head>    
            <body>
    ";
}

function echoFooter(){
    echo"  <footer></footer>                            
           </body>    
        </html>
       ";
    }


function passVariableThroughLink($filename, $id, $linkName){
    echo "<a href=$filename?id=$id> $linkName </a>";
}      

