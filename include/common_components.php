<?php

// Common to all files
// --------------------------------------------------------------------------

function echoHeader($title){
    echo "<html>                                                                                                      
            <head>              
                <title>$title</title>  
                <link href='style.css' rel='stylesheet'>                                                          
            </head>            
            <body>";
}

// --------------------------------------------------------------------------

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

// --------------------------------------------------------------------------

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

// list_students.php file
// --------------------------------------------------------------------------

function echoSearchBar($heading){
    echo"
    <div class='flex-container-searchBarButtons'>
        <div>
            <h2>$heading</h2>
            <div class='flex-item-SearchBar'>
                <form action='' class='search-bar'>
                <input type='text' placeholder='Search' name='searchBar'>
                <button class='searchB' type='submit'><img class= 'searchButton'src='/images/search.jpg' alt='search'></button>
                </form>
            </div> 
        </div>     
";    
}

// --------------------------------------------------------------------------

function addButtons($heading){
    echo"
        <div class='flex-item-buttons'>              
            <button onclick= document.getElementById('id01').style.display='block' style='width:fit-content;'>$heading</button>
        </div>
    </div>    
";    
}

// --------------------------------------------------------------------------

function echoStudentTable($students, $credits, $classes, $days){
    echo"
    <div class='studentTable'>
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
</div>
";
}  

// student_profile.php file
// --------------------------------------------------------------------------

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

// --------------------------------------------------------------------------

function echoFormButtons($credits){  
   echo"
            <div class='flex-item-buttons'>
                <p>$credits credits</p>
                <div class='item-buttons'>
                    <button onclick='openClassForm()'>Book Class</button>
                    <button onclick='openCreditForm()'>Add Credit</button>
                </div>
            </div>
        </div>   
";
}

// --------------------------------------------------------------------------

function echoClassesInfo($classes, $heading){
    echo"    
            <div class='flex-item-classesInfo'>
                <p class='classBlock'>$heading</p>
                <div>";
    
    if(!empty($classes)){
        foreach($classes as $class){                                                                //Eventually a link will be clicked to show the class info with link etc
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

// --------------------------------------------------------------------------

function echoNotes($notes, $heading){
    $message;

    echo" <div class='flex-item-classesInfo'>
            <p class='classBlock'>$heading</p>
            <div>";
    
    (!empty($notes))? $message = $notes : $message = 'No notes';  
    
    echo"       <p>$message</p>                       
            </div>
        </div>";
}

// --------------------------------------------------------------------------

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

// Forms
// --------------------------------------------------------------------------

function createNewStudentForm(){
    echo"         
    <div id='id01' class='modal'>        
        <form class='modal-content animate' action='' method='post'>
          <div class='imgcontainer'>
            <span onclick= document.getElementById('id01').style.display='none' class='close' title='Close Modal'>&times;</span>
            <img src='/images/Profile_Yuni.jpg' alt='profile_picture' class='avatar'>
          </div>
      
          <div class='container'>
            <label for='ufname'><b>First Name</b></label>
            <input type='text' placeholder='First Name' name='ufname' required>
    
            <label for='ulname'><b>Last Name</b></label>
            <input type='text' placeholder='Last Name' name='ulname' required>
                  
            <label for='uemail'><b>Email</b></label>
            <input type='email' placeholder='Email' name='uemail' required>
         
            <label for='uphone'><b>Phone</b></label>
            <input type='tel' name='uphone' placeholder='999-999-9999' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' required>

            <label for='urating'><b>ELO Rating</b></label>
            <input type='number' min='0' max='3000'placeholder='ELO' name='urating' required>       
          </div>
      
          <div class='container' style='background-color:#f1f1f1'>
              <button type='submit' name='AddStudentSubmitted'>Add</button>
              <button type='button' onclick= document.getElementById('id01').style.display='none' class='cancelbtn'>Cancel</button>
          </div>
        </form>
      </div>
    
      <script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
      </script>   
";
}

// --------------------------------------------------------------------------

function createAddCreditsForm(){
    echo"          
        <div class='form-popup' id='addCreditsForm'>
            <form action='' class='form-container'>                
                <button type='submit' class='btn' name='AddCredditsSubmitted'>Add</button>
                <button type='button' class='btn cancel' onclick='closeCreditForm()'>Close</button>

                <label for='camount'><b>Credits Amount</b></label>
                <input type='number' min='0' max='100' placeholder='0 - 100' name='camount' required>

                <label for='id'><b></b></label>
                <input type='hidden' name='id' value=$_REQUEST[id]>        
            </form>
        </div>
        
        <script>
            function openCreditForm() {
                document.getElementById('addCreditsForm').style.display = 'block';
            }
            
            function closeCreditForm() {
                document.getElementById('addCreditsForm').style.display = 'none';
            }
        </script>      
    ";
}

// --------------------------------------------------------------------------

function createAddClassForm(){
    echo"          
        <div class='form-popup' id='addClassForm'>
            <form action='' class='form-container'>
                <button type='button' class='btn cancel' onclick='closeClassForm()'>Close</button>
                <button type='submit' class='btn' name='AddClassesSubmitted'>Book</button>

                <label for='ctype'>Class Type</label>
                <select id='dropdown' name='ctype'>
                    <option value='Online'>Online</option>
                    <option value='In Person'>In Person</option>                  
                </select>   

                <label for='classDate'>Class Date</label>
                <input type='datetime-local' name='classDate' required> 

                <label for='czoomLink'><b>Zoom Link</b></label>
                <input type='text' placeholder='Link' name='czoomLink' required> 

                <label for='id'><b></b></label>
                <input type='hidden' name='id' value=$_REQUEST[id]>        
            </form>   
        </div>
        
        <script>
            function openClassForm() {
                document.getElementById('addClassForm').style.display = 'block';
            }
            
            function closeClassForm() {
                document.getElementById('addClassForm').style.display = 'none';
            }
        </script>      
    ";
}

// Used by most files
// -------------------------------------------------------------------------- 

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

