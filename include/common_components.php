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
                                <img class ='circlePicture zoom' src= '/images/Profile_Yuni.jpg' alt='Profile_Yuni'>
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
                                    <a href='#'> <img class = 'notificationIcon zoom' src= '/images/notification.png' alt='notification'></a> 
                                    <li class='zoom'><a href='/admin/index.php'; '>Home</a></li>                   
                                    <li class='zoom'><a href='/admin/list_students.php'>Students</a></li>
                                    <li class='zoom'><a href='/admin/calendar.php'>Calendar</a></li> 
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
                <script src='/include/form_functions.js'></script> 
                <script src='/include/dayViewCalendar.js'></script>
                <script src='/include/events.js'></script>
                <footer></footer>                            
           </body>    
        </html>
";
}

// --------------------------------------------------------------------------

