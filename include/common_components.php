<?php

function echoHeader($title, $number){
 echo "<html>                                                                                                      
            <head>              
               <title>$title</title>  
               <link href='style.css' rel='stylesheet'>                                                          
            </head>
            
            <body>  
                <nav>
                    <ul>                         
                        <a href='#'> <img class = 'notificationIcon' src= '/images/notification.png' alt='notification'></a> 
                        <li><a href='#'>Students</a></li>
                        <li><a href='#'>Calendar</a></li> 
                        <li><a href='#'>Home</a></li>                        
                    </ul>
                <header>My Students 
                    <p class='sub-header'>You have $number students</p>                                             
                </header>   
            </nav>           
       ";
}  

function echoSearchBar(){
    echo"
        <h2>Students' List</h2>

        <div class='SearchBarContainter'>
            <form action='' class='search-bar'>
            <input type='text' placeholder='Search' name='searchBar'>
            <button type='submit'><img src='/images/search.jpg' alt='search'></button>
            </form>
        </div>         
        
         ";    
}

function echoVerticalBar(){
  echo"
        <div class='vertical'>  
            <img class ='circlePicture' src= '/images/Profile_Yuni.jpg' alt='Profile_Yuni'>
            <h1 class='profileHeading'>Yuniesky Quesada</h1>
        </div> 
  ";
}

function echoTable($students, $allCredits, $allClasses, $days){
    echo"
        <div class='tableContainer'>
            <table id='studentsTable'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>ELO</th>
                    <th>Credits</th>
                    <th>Booked</th>
                    <th>Days to next Class</th>                   
                </tr>    
        ";         
         
        $i = 0;
        foreach($students as $student){                                                  
        echo"
            <tr>
                <td>";passVariableThroughLink('student_profile.php', $student['Student_Id'], $student['First_Name']." ".$student['Last_Name']);echo"</td>
                <td>".$student['Email']."</td>
                <td>".$student['Phone']."</td>
                <td>".$student['ELO']."</td>   
                <td>".$allCredits[$i]['Credits']."</td>   
                <td>".$allClasses[$i]['Classes']."</td> 
                <td>".$days[$i]."</td>                                    
            </tr> 
            "; 
        $i++;
        } 
        
        echo"</table>            
        </div>";
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

// function getImageSource($class, $name){
//     echo "<img class = '$class' src= '/images/$name.jpg' alt='$name'>";
// }


// function echoCircleImage($class, $profilePic){
//     echo "<header>";
//         getImageSource($class, $profilePic);
//     echo"</header>";    
// } 

