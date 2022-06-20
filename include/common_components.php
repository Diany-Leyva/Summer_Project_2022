<?php

// Common to all files
function echoHeader($title){
    echo "<html>                                                                                                      
            <head>              
                <title>$title</title>  
                <link href='style.css' rel='stylesheet'>                                                          
            </head>            
            <body>";
}

function echoVerticalBar(){
    echo"
        <section class='wrapper'>
            <section>  
                <div class='flex-container-verticalBar'>  
                    <div class='flex-item-verticalBarPicture'>
                        <img class ='circlePicture' src= '/images/Profile_Yuni.jpg' alt='Profile_Yuni'>
                        <h1 >Yuniesky Quesada</h1>
                    </div>            
                </div>  
        </section>      
    ";
  }

function echoHorizontalBar($heading, $subheading){
 echo " 
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

function echoFooter(){
    echo"  
                    </section>
                </section>  
                <footer></footer>                            
           </body>    
        </html>
       ";
}

// list_students.php file

function echoSearchBar($heading){
    echo"
        <div class='flex-container-searchBar'>
            <h2>$heading</h2>
            <div class='flex-item-SearchBar'>
                <form action='' class='search-bar'>
                <input type='text' placeholder='Search' name='searchBar'>
                <button type='submit'><img class= 'searchButton'src='/images/search.jpg' alt='search'></button>
                </form>
            </div> 
        </div>     
";    
}

function echoStudentTable($students, $credits, $classes, $days){
    echo"
        <table id='tableContainer'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>ELO</th>
                <th>Credits</th>
                <th>Classes</th>
                <th>Next Class in</th>                   
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
            <td>".$credits[$i]['Remaining_Credits']."</td>   
            <td>".$classes[$i]['Classes_Pending']."</td>";
            
            $daysToNextCLass = $days[$i]['Days']." days";
            
            if($days[$i]['Months'] != 0){
                $daysToNextCLass = $days[$i]['Months']." months and ".$days[$i]['Days']. " days";
            }
        echo"
            <td>$daysToNextCLass</td>                                    
        </tr> 
"; 
        $i++;
} 

echo"</table>
";
}  

// student_profile.php file

function echoProfileInfo($student, $picture){
    echo"
        <div class='flex-container-pictureCredits'>
            <div class='flex-item-profileInfo'>
                <ol>
                    <li>".$student['First_Name']." ".$student['Last_Name']."</li>
                    <li>".$student['Email']."</li>
                    <li>".$student['Phone']."</li>    
                    <li>ELO ".$student['ELO']."</li>
                    <li>".$student['Lichess_Link']."</li>
                </ol>
                <div class='picturePosition'>
                    <a href='#'> <img class = 'profilePicture' src= '/images/$picture.png' alt='$picture'></a>
                </div> 
            </div>  
";
}


function echoFormButtons($credits){
    echo"
            <div class='flex-item-buttons'>
                <p>$credits credits</p>
                <button type='button'>Book Class</button>
                <button type='button'>Add Credits</button>
            </div>
        </div>   
";
}

function echoClassesInfo($classes, $heading){
    echo"    
            <div class='flex-item-classesInfo'>
                <p class='classBlock'>$heading</p>
                <div>";
    
    if(!isEmpty($classes)){
        foreach($classes as $class){                                             //Eventually a link will be clicked toshow the class info with link etc
            echo"  
            <li>".$class['Type']."  ".formatDate($class['Start_Date'], 'D  M  dS  H:i A')."</li>                       
            ";        
        }    
    }
    
    else{
        echo"    
            <li> No classes</li>                     
        ";
    }

    echo"   </div>
        </div>";
}

function echoNotes($notes, $heading){
    $message;

    echo" <div class='flex-item-classesInfo'>
            <p class='classBlock'>$heading</p>
            <div>";
    
    (!isEmpty($notes))? $message = $notes : $message = 'No notes';  
    
    echo"<p>$message</p>                       
              </div>
        </div>";
}

function echoTotalClassesSection($monthNumber, $yearNumber){
    echo"
        <div class='flex-container-totalClassesSection'>
            <div class='flex-item-total'>
                <p class='totalSectionHeader'>Month</p>         
                <div class='profilePicture'>
                    <p id='totalNumber'>$monthNumber</p>
                </div>
            </div>
        
            <div class='flex-item-total'>
                <p class='totalSectionHeader'>Year</p>  
                <div class='profilePicture'>
                    <p id='totalNumber'>$yearNumber</p>
                </div>
            </div>
        </div>
";
}

// Used by most files 

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

