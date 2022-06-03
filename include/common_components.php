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
    echo "<a href=".$file." class= ".$class." > ".$headerName." </a>";
}

function passVariableThroughLink($file, $id, $class, $tittle){
    echo "<li><a href=$file?id=$id class=$class> $tittle </a></li>";
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
                    <a href='$file?id=$id' class='buttons text'> $tittle </a>       
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
        <form method = 'post' action=''> 
           
    ";     
            echoHeadingTwoColors('Leave a reply');
echo"  
       
       
           Your email address will not be published. Required fields are marked *<br>
         
          Comment
                <textarea cols='45' rows='8' maxlength='65525' name='Content'></textarea>                  
                <ul> 
                    <li>
                        <label for='name'>Name *</label>                                  
                        <input type='text' id = 'name' name='Name'>
                    </li>
                    <br> </br>  
                    <li>
                        <label for='mail'>Email *</label>
                        <input type='text' id='mail' name='Email'>       
                    </li> 
                    <br> </br>
                    <li> 
                        <label for='website'>Website</label>
                        <input type='text' id='website' name='Website'>                         
                    </li> 
                    <br></br>
                    <li>
                        <input  class = 'buttons text reply' type= 'submit' name='CommentsFormPostComment' value='Post Comment'>
                    </li>
                </ul>          
        </form> 
    
    ";
}







