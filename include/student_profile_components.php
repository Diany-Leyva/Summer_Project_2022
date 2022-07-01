<?php

// --------------------------------------------------------------------------

function echoProfileInfo($student, $picture){
    echo"
        <div class='flex-container-pictureCredits'>
            <div class='flex-item-profileInfo'>
                <ol>
                    <li>".$student['FirstName']." ".$student['LastName']."</li>
                    <li>".$student['Email']."</li>
                    <li>".$student['Phone']."</li>    
                    <li>ELO ".$student['ELO']."</li>
                    <li>".$student['LichessLink']."</li>
                </ol>
                <div class='picturePosition'>
                    <a href='#'> <img class= 'profilePicture' src= '/images/$picture.png' alt='$picture'></a>
                </div> 
            </div>  
";
}

// --------------------------------------------------------------------------

function echoAddClassAndAddCreditsButtons($credits){      
   echo"
            <div class='flex-item-buttons'>
                <p>$credits credits</p>
                <div class='item-buttons'>
                    <button class='zoom' onclick='openClassForm()'>Book Class</button>
                    <button class='zoom' onclick='openCreditForm()'>Add Credit</button>
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
                        <li>".$class['Type']."  ".formatDate($class['StartDate'], 'D  M  dS  H:i A')."</li>                       
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

function echoTotalClassesSection($totalClasses){
    echo"
        <div class='flex-container-totalClassesSection'>
            <div class='flex-item-total'>
                <p class='totalSectionHeader'>Month</p>         
                <div class='profilePicture'>
                    <p id='totalNumber'>".$totalClasses['MonthTotal']."</p>
                </div>
            </div>
        
            <div class='flex-item-total'>
                <p class='totalSectionHeader'>Year</p>  
                <div class='profilePicture'>
                    <p id='totalNumber'>".$totalClasses['YearTotal']."</p>
                </div>
            </div>
        </div>
";
}

// --------------------------------------------------------------------------