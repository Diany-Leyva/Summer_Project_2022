<?php

function echoHeader($title, $number){
 echo "<html>                                                                                                      
            <head>              
               <title>$title</title>  
               <link href='style.css' rel='stylesheet'>                                                          
            </head> 

            <nav>
                <ul>
                    <li><a href='#'> <img class = 'notificationIcon' src= '/images/notification.png' alt='notification'></a></li>  
                    <li><a href='#'>Students</a></li>
                    <li><a href='#'>Calendar</a></li> 
                    <li><a href='#'>Home</a></li> 
                    <header>My Students 
                        <p class='sub-header'>You have $number students</p>                                             
                    </header>                    
                </ul>
            </nav>    
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

// function echoLink($file, $name){
//     echo "<a href='$file'>$name</a>";
// }

// function echoImageLink($file, $name, $class){
//     echo "<a href='$file'>";
//     getImageSource($class, $name);
//     echo "</a>";
// }

function getImageSource($class, $name){
    echo "<img class = '$class' src= '/images/$name.jpg' alt='$name'>";
}


function echoCircleImage($class, $profilePic){
    echo "<header>";
        getImageSource($class, $profilePic);
    echo"</header>";    
} 

