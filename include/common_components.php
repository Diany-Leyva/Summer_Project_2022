<?php

function echoHeader($title){
 echo "<html>                                                                                                      
            <head>              
               <title>$title</title>  
               <link href='style.css' rel='stylesheet'>                                                          
            </head> 

            <nav>
                <ul>
                    <li><a href='#'> <img class = 'notification' src= '/images/notification.png' alt='notification'></a></li>  
                    <li><a href='#'>Students</a></li>
                    <li><a href='#'>Calendar</a></li> 
                    <li><a href='#'>Home</a></li>                         
                </ul>
            </nav>      
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
    echo "<a href='$filename?id=$id'> $linkName </a>";
}      

function echoLink($file, $name){
    echo "<a href='$file'>$name</a>";
}

function echoImageLink($file, $name, $class){
    echo "<a href='$file'>";
    getImageSource($class, $name);
    echo "</a>";
}

function getImageSource($class, $name){
    echo "<img class = '$class' src= '/images/$name.jpg' alt='$name'>";
}


