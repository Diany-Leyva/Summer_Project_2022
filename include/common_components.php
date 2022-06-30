<?php
// --------------------------------------------------------------------------

function echoPageLayout($title, $heading, $subheading){
    echo "<html>                                                                                                      
            <head>              
                <title>$title</title>  
                <link href='style.css' rel='stylesheet'>                                                                        
            </head>            
            <body>
                <section class='wrapper'>
                    <section>  
                        <div class='flex-container-verticalBar'>  
                            <div class='flex-item-verticalBarPicture'>
                                <img class ='circlePicture' src= '/images/Profile_Yuni.jpg' alt='Profile_Yuni'>
                                <h1 >Yuniesky Quesada</h1>
                            </div>            
                        </div>  
                    </section>  
                    <section>     
                        <nav>
                            <header>$heading
                                <p> $subheading</p>
                            </header>
                            <div class='flex-item-horizontalMenu'>
                                <ul>                         
                                    <a href='#'> <img class = 'notificationIcon' src= '/images/notification.png' alt='notification'></a> 
                                    <li><a href='#'>Students</a></li>
                                    <li><a href='#'>Calendar</a></li> 
                                    <li><a href='#'>Home</a></li>                        
                                </ul> 
                            </div>                
                        </nav>  
";
}

// --------------------------------------------------------------------------

function echoFooter(){
    echo"  
                    </section>
                </section> 
                <script src='/include/javascriptFunctions.js'></script> 
                <footer></footer>                            
           </body>    
        </html>
";
}

// --------------------------------------------------------------------------

