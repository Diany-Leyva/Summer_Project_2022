<?php

// ********************************************************************************************************************************
//In this function several things are happening. In line 21 I attempted to pass the student php array ar parameter to
//the openStudentForm() js function but that wasn't working, so I hid an array and then
//got that value wihtin the js function.I was also having trouble when encodig the student array because
//when I tried to parse it in the js function it had missing elements so I had to make it smaller in line 14 and I'm passing
//only the elements I need in the form.  In line 35 I do something similar but passing the variable
//to the function to then delete the student. 
// ********************************************************************************************************************************

function echoProfileInfo($student, $picture){
    $studentId = $student['StudentId'];   
    $studentArray = array('StudentId'=>$student['StudentId'], 'FirstName'=>$student['FirstName'], 'LastName'=>$student['LastName'], 
    'Email'=>$student['Email'], 'Phone'=>$student['Phone'], 'Rating'=>$student['ELO'], 'Lichess'=>$student['LichessLink']); 
   
    echo"
        <div class='flex-container-pictureCredits'>
            <div class='flex-item-profileInfo'>
                <ol>
                    <li>".$student['FirstName']." ".$student['LastName']."</li>
                    <li>".$student['Email']."</li>
                    <li>".$student['Phone']."</li>    
                    <li>ELO ".$student['ELO']."</li>
                    <li>".$student['LichessLink']."</li>
                    <input type='hidden' id='hiddenStudent-Edit' value=";echo json_encode($studentArray);echo"       
                </ol>
                <div class='picturePosition'>
                   <img class= 'profilePicture' src= '/images/$picture.png' alt='$picture'>
                </div>

            </div>            
            
            <button class='editButton onProfile zoom' onclick='openStudentForm($studentId)'>✏️</button>
            <button class='deleteButton onProfile zoom' onclick='openDeleteStudent($studentId)'>🗑</button>       
            
";
}

// ********************************************************************************************************************************
//Since I'm using the same form for both add and subtract, then I'm passing Add or Subtract
//to the js function to indicate which button was clicked
// ********************************************************************************************************************************

function echoAddClassAndAddCreditsButtons($credits){ 
   
    $buttonState = "enabled class='zoom'";
    
    if($credits == 0){                                                                                  //I want subtract and class button to be enabled only when credits are more than 0
        $buttonState = "disabled style ='background-color: #8080807a; cursor:context-menu;'"; 
    }     
  
    echo"
            <div class='flex-item-buttons'>
                <p>$credits credits</p>
                <div class='item-buttons'>                    
                    <button class='zoom' onclick=\"openCreditForm('Add', '')\">+</button>               
                    <button $buttonState onclick=\"openCreditForm('Subtract', $credits)\">-</button>
                    <button $buttonState onclick=\"openClassForm('')\">Book Class</button>
                </div>
            </div>
        </div>   
";
}

// ********************************************************************************************************************************
//Here I'm giiving the ability to edit a class by clicking the class
//to do this I hide the class array in a hidden field and then I access
//the array from the js function. I pass the classId to identify when 
//I'm editing and when creating a class. When I create a class in a different session 
//here I pass an empty string, but when editing I pass the classId.
// ********************************************************************************************************************************

function echoFutureClassesInfo($classes, $heading){
    echo"
            <div class='flex-item-classesInfo'>
                <div>
                    <p class='classInfoHeading'>$heading</p>";
            
                        if(!empty($classes)){                            
                            foreach($classes as $class){
                                $classId = $class['ClassId']; 
                                $date = formatDate($class['StartDate'], 'Y-m-d');
                                $time = formatDate($class['StartDate'], 'H:i');

                                $classArray = array('ClassId'=>$class['ClassId'], 'Type'=>$class['Type'], 'ClassDate'=>$date, 'ClassTime'=>$time, 'ZoomLink'=>$class['ZoomLink'], 'StudentId'=>$class['StudentId']); 
                                                           
                                echo"                  
                                    <li class='info-table-row zoom'><button class='deleteButton onClassInfo zoom' onclick='openDeleteClass($classId)'>🗑</button>
                                    <span onclick='openClassForm($classId)'>".$class['Type']."  ".formatDate($class['StartDate'], 'D  M  dS  H:i A')."</span>                     
                                    <input type='hidden' id='hiddenClass-Edit' value=";echo json_encode($classArray);echo">                                     
                                    </li>
                                ";        
                            }    
                        }
                        
                        else{
                            echo"    
                                <li class='info-table-row'> No classes</li>                     
                            ";
                        }
        echo"   </div>
            </div>";
}

// ********************************************************************************************************************************

function echoPastClassesInfo($classes, $heading){
    echo"
            <div class='flex-item-classesInfo'>
                <div>
                    <p class='classInfoHeading'>$heading</p>";
            
                        if(!empty($classes)){                            
                            foreach($classes as $class){                                                                                              
                                echo"                  
                                    <li class='info-table-row'>".$class['Type']."  ".formatDate($class['StartDate'], 'D  M  dS  H:i A')."                      
                                    </li>
                                ";        
                            }    
                        }
                        
                        else{
                            echo"    
                                <li class='info-table-row'> No classes</li>                     
                            ";
                        }
        echo"   </div>
            </div>";
}

// ********************************************************************************************************************************
//these two function are very similar so I will combine them but I was getting 
//unexpected behavior when I had only one function so I will keep it like
//this for now and then combine them
// ********************************************************************************************************************************

function echoPrivateNotes($notes){   
    $message;

    echo"<div>";
            (!empty($notes))? $message = $notes : $message = 'No notes';  
        echo"<p class='classInfoHeading'>Private Notes</p>
        <form action='' method='post'>
            <textarea name='privateNotes' id='privateNotesTextarea' class='flex-item-classesInfo' onclick=showSaveButton('privNotesSaveButton') rows='4' cols='50'>$message</textarea>
            <button class='saveNoteButton zoom' type='submit' id='privNotesSaveButton' name='privNotesSaveButtonSubmitted'>Save</button>
        </form>
            </div>";
}

// ********************************************************************************************************************************

function echoPublicNotes($notes){   
    $message; 

    echo"<div>";
            (!empty($notes))? $message = $notes : $message = 'No notes';  
        echo"<p class='classInfoHeading'>Public Notes</p>
        <form action='' method='post'>
            <textarea name='publicNotes' id='publicNotesTextarea' class='flex-item-classesInfo' onclick=showSaveButton('publicNotesSaveButton') rows='4' cols='50'>$message</textarea>
            <button class='saveNoteButton zoom' type='submit' id='publicNotesSaveButton' name='publicNotesSaveButtonSubmitted'>Save</button>
        </form>
            </div>";
}

// ********************************************************************************************************************************

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

// ********************************************************************************************************************************