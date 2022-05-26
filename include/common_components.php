<?php

include('initialize.php');


function echoHeader($tittle, $class, $image){
    echo "<html>                                                                                                      
    <head>
        <meta charset='utf-8'>
        <title>$tittle</title>                                                                  
        <link href='style.css' rel='stylesheet'>
    </head>

    <body>  
        <header>";
        getImageSource($class, $image);
        echo"</header>";    

}

function getImageSource($class, $image){
    echo "<img class= $class src= '/images/$image.jpg' alt='$image'>"; 

}

function getLink($file, $class, $headerName){
    echo "<a href= $file class= $class > $headerName </a>";
}


function echoHeading($firstString, $secondString){
    echo "$firstString <span style= 'color: #AF766E; '>$secondString:</span><br/>";
}

function echoCHildWithImage($file, $tittle){
echo "<div class='items'>";        
         getImageSource('image', $tittle);
echo"       <div class='middle'>";
                 getLink($file, 'text', $tittle);                
echo "     </div>
      </div>";
}