<?php
// --------------------------------------------------------------------------

function echoHeader($title){
    echo "<html>                                                                                                      
    <head>              
        <title>$title</title>  
        <link href='style.css' rel='stylesheet'>                                                                        
    </head> ";
}

function echoPageLayout($heading, $subheading, $adminInfo){

    echo "  <body>
                <section class='wrapper'>
                    <section class='vertical'>  
                        <div class='flex-container-verticalBar'>  
                            <div class='flex-item-verticalBarPicture'>
                                <img class ='circlePicture zoom' src= '/images/Profile_Yuni.jpg' alt='Profile_Yuni'>
                                <p class='adminName' >".$adminInfo['FirstName']." ".$adminInfo['LastName']."</p>
                                <a href='login.php' class='logOutLink' name='logOutLink'>Log Out</a>
                            </div>            
                        </div>  
                    </section>  
                    <section class='horizontal'>     
                        <nav>
                            <header>$heading
                                <p> $subheading</p>
                            </header>
                            <div id='horizontalMenu' class='flex-item-horizontalMenu'>
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

function echoCommonJSFiles(){
    echo" 
         
        <script src='/include/form_functions.js'></script> 
        <script src='/include/dayViewCalendar.js'></script>
        <script src='/include/events.js'></script>
    ";
}

// --------------------------------------------------------------------------

function echoFooter(){
    echo"   
            
    </section>
    </section>    
        <footer></footer>                            
    </body>    
</html>
";
}

// --------------------------------------------------------------------------
