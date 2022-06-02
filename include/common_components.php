<?php

function echoHeader($tittle){
    echo "<html>                                                                                                      
            <head>
                <meta charset='utf-8'>
                <title>$tittle</title>                                                                  
                <link href='style.css' rel='stylesheet'>
            </head>    
            <body>";
}

function echoCircleImage($class, $image){
    echo "<header>";
        getImageSource($class, $image);
    echo"</header>";    
}

function echoBackgroundImageHeader($class){
    echo "<header class=$class></header>";     
}    

function getImageSource($class, $image){
    echo "<img class= $class src= '/images/$image.jpg' alt='$image'>";
}

function getLink($file, $class, $headerName){
    echo "<a href= $file class= $class > $headerName </a>";
}

function passVariableThroughLink($file, $id, $class, $tittle){
    echo "<li><a href='$file?id=$id' class='$class'> $tittle </a></li>";
}

function echoHeadingTwoColors($heading){

    $lastWord = getLastWord($heading);  
    $newHeading = removeLastWord($heading); 

    echo"$newHeading <span style= 'color: #AF766E; '> $lastWord </span><br/>
        ";
}

function echoCHildWithImage($file, $id, $tittle){
echo"   <div class='items'>";
            getImageSource('image', $tittle);
echo"            <div class='middle'>
                    <a href='$file?id=$id' class='text'> $tittle </a>       
           </div>
        </div>
     ";
}

function echoFooter(){
echo"            <footer></footer>                            
             </body>    
       </html>
   ";
}

function createNewsletterForm(){
echo"   <form method = 'post' action=''>                                       
        Name: <input type= 'text' name='Name' />
        <br> </br>
        Email: <input type= 'text' name='Email' />
        <br> </br>
        <input type= 'submit' name='NewsletterFormSubmit'/>
        </form> 
    ";
}


function createCommentsForm(){
echo"
        <h1 class ='reply'>
    ";     
        echoHeadingTwoColors('Leave a reply');

    echo"
        </h1>
        <h3>Your email address will not be published. Required fields are marked *<br>
        <p class ='areacomment'>Comment</p>
        <textarea cols='45' rows='8' maxlength='65525'></textarea>     
        </h3>
        <form method = 'post' action=''> 
            <ul class='labels'> 
                <label for='name'> Name *</label>                                  
                <input type= 'text' id = 'name' name='user_name'>
            </ul> 
            <br> </br>  
            <ul>  
                <label for='mail'>Email *</label>
                <input type='text' id='mail' name='user_email'>       
            </ul> 
            <br> </br>
            <ul>   
                Website <input type='text' name='Website'>             
            </ul> 
            <br></br>
            <ul> 
                <input type= 'submit' name='CommentsFormPostComment' value='Post Comment'>
            </ul>
        </form>  
    ";
}






