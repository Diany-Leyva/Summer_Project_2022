<?php

// *********************************************************************************************************************************

function echoHeader($title){
    echo "<!DOCTYPE html>                                                                                                    
    <head>              
        <title>$title</title>  
        <link href='style.css' rel='stylesheet'>                                                                        
    </head> ";
}

// *********************************************************************************************************************************

function echoPageLayout($heading, $subheading, $adminInfo){
 
    echo " <body>
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
                            <div class='navProfilePicture'>   
                                <a href='#'> <img class = 'circlePicture zoom' src= '/images/Profile_Yuni.jpg' alt='Profile_Yuni'></a> 
                                <p class='adminName' >".htmlspecialchars($adminInfo['FirstName'])." ".htmlspecialchars($adminInfo['LastName'])."</p>
                                <a href='login.php' class='logOutLink' name='logOutLink'>Log Out</a>
                            </div>  
                        </ul> 
                    </div>                
                </nav>
";
}

// *********************************************************************************************************************************

function echoFooter($jsFiles){
    echo"    
        <footer></footer> 
        $jsFiles                           
    </body>   
</html>
";
}

// *********************************************************************************************************************************

