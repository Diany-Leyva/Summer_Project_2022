<?php

// *********************************************************************************************************************************

function studentForm(){
    echo"         
    <div id='studentForm' class='modal'> 
        <form action='' method='post' class='form-container students animate'>
            <div class='imgcontainer'>
                <img src='/images/Profile_Yuni.jpg' alt='profile_picture' class='avatar'>
            </div>
        
            <h1>Student</h1>         
            <div class='txtField student'>          
                <input type='text' name='ufname' id='fname' value='' required>
                <span></span>
                <label for='ufname'>First Name</label>   
            </div>
                
            <div class='txtField student'>          
                <input type='text' name='ulname' id='lname' value='' required>
                <span></span>
                <label for='ulname'>Last Name</label> 
            </div>

            <div class='txtField student'>          
                <input type='email' name='uemail' id='email' value='' required>
                <span></span>
                <label for='uemail'>Email</label>
            </div>

            <div class='txtField student'>          
                <input type='tel' name='uphone' placeholder='999-999-9999' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' id='phone' value='' required>
                <span></span>
                <label for='uphone'>Phone</label>
            </div>

            <div class='txtField student'>          
                <input type='number' min='0' max='3000' name='urating' id='rating' value='' required>
                <span></span>
                <label for='urating'>ELO Rating</label>
            </div>
                    
            <div class='txtField student'>          
                <input type='text' name='ulichess' id='lichess' value='' required>              
                <span></span>
                <label for='ulichess'>Lichess Username</label>
            </div>              
                  
            <div class='buttons-container student'>
                <button type='submit' class='submit' id='submitStudentButton' name='AddStudentSubmitted'>Add</button>
                <button type='button' class='cancel' onclick= 'closeStudentForm()'>Cancel</button>
            </div>
        </form>
    </div>   
";
}

// *********************************************************************************************************************************

function creditsForm(){

    echo"          
        <div id='creditsForm' class='modal'>
            <form action='' method='post' class='form-container credits animate'> 
                <h1 class='creditsForm'>Credits</h1>
                <div class='txtField2 credit'>          
                    <input id='maxCredit' type='number' min='1' max='100' placeholder='1 - 100' name='camount' required>
                    <label for='camount'>Credits Amount</label>
                </div>                    

                <div class='buttons-container credits'>
                    <input type='hidden' id='hiddenButtonName' name='hiddenButtonName' value=''>
                    <button type='submit' class='submit' name='changeCreditsSubmitted'>Submit</button>               
                    <button type='button' class='cancel' onclick='closeCreditForm()'>Cancel</button>
                </div>
            </form>
        </div>

        
";
}

// *********************************************************************************************************************************
//I'm sure that as I get more familiar with js libraries I will be able to
//updated this date-time picker :). I'm literally just using a list for time
//but I don't want to allow 4:35Pm as a time for instance, I just want :00 or
// :30 as an option 
// *********************************************************************************************************************************

function classForm($defaultZoomLink){
    $today = date('Y-m-d');
    $defaultZoomLink = htmlspecialchars($defaultZoomLink);

    echo"          
        <div id='classForm' class='modal'>
            <form action='' method='post' class='form-container class animate'>  
                <h1 class='classForm'>Class</h1>                 

                <div class='txtField class'> 
                    <select id='dropdown' name='ctype' required>
                        <option hidden></option>                              
                        <option value='Online'>Online</option>
                        <option value='In-Person'>In-Person</option>                  
                    </select> 
                    <span></span>        
                    <label for='ctype'>Class Type</label>
                </div>

                <div class='txtField class'>          
                    <input type='date' id='ClassDate' name='classDate' min='$today' required>
                    <span></span>
                    <label for='classDate'>Class Date</label>
                </div>
              
                <div class='txtField class'>  
                    <select name='classTime' id='clock' required>         
                        <option hidden></option>";  
                        for($i = 8; $i < 24; $i++){
                            //the format I have been using is with two digist so I'm just adding a 0 so, for instance,
                            //we get 08:00 instead of 8:00
                            if($i < 10){
                                $hour = "0".$i.":00";
                                $min = "0".$i.":30";
                            }

                            else{
                                $hour = $i.":00";
                                $min = $i.":30";
                            }                      
                    
                            echo"<option value=$hour>$hour</option>";

                            if($i < 23){                                                                  //because I don't want them to be able to schedule pass 23:00 
                                echo"<option value=$min>$min</option>";
                            }
                        }
                        echo"
                    </select>
                    <span></span> 
                    <label for='classTime'>Class Time</label>
                </div>     
               
                <div class='txtField class'>
                    <input type='text' id='zoomLink' name='czoomLink' required>  
                    <span></span>
                    <label for='czoomLink'>Zoom Link</label>
                </div>        
                          
                <input class='toggle class' type='checkbox' id='ZoomLinktoggle' name='classToggle'> 
                <input type='hidden' id='hiddendefaultZoomLink' value='$defaultZoomLink'></input>                         
                <label id='toggleLinkHeading' class='toggleLinkHeading'>Default Link</label>   
                                                
                <div class='buttons-container class'>
                    <button type='submit' id='submitButtonClass' class='submit' name=''>Book</button>
                    <button type='button' class='cancel' onclick='closeClassForm()'>Cancel</button>  
                    <input type='hidden' id='hiddenClassId-EditForm' name='classId' value=''>                                 
                </div>      
            </form>   
        </div>         
";
}

// *********************************************************************************************************************************

function classFormIndexPage($students, $zoomLink){
    $today = date('Y-m-d'); 
    $defaultZoomLink = htmlspecialchars($zoomLink);                                 //There was a syntax issue when placing this in the value so 
                                                                                                    //I stored it in a variable for now and it works 
    echo"          
        <div id='classFormIndexPage' class='modal'>
            <form action='' method='post' class='form-container classIndexPage animate'>  
                <h1 class='indexPageClassForm'>Class</h1>                 

                <div class='txtField classIndexPage'> 
                    <select name='listStudentId' id='studentListIndexPage'>";         
                     foreach($students as $key=>$student){
                         $credit = calcStudentRemainingCredits($key);                         
                        echo"<option id='studentId$key' value=$key>".htmlspecialchars($student['FirstName'])." ".htmlspecialchars($student['LastName'])."</option>
                        <option hidden id='credits$key' value='$credit'></option>";                     
                    } 
                    echo" 
                    </select>
                    <span></span>        
                    <label for='listStudentId'>Students' List</label>
                </div>

                <div class='txtField2 classIndexPage'>
                    <input type='text' name='StdCreditAmount' id='StdCreditAmount' value='' readonly>
                    <label for='StdCreditAmount'>Remaining credits</label>
                </div>        
                            
                <input class='toggle credit' type='checkbox' id='toggle' name='StdToggle' required> 
                <label id='creditLabel' class='creditLabel'>Add one credit</label>   

                <div class='txtField classIndexPageSecondHalf'>          
                    <input type='date' id='ClassDateIndexPage' name='classDate' value='$today' min='$today' required>
                    <span></span>
                    <label for='classDate'>Class Date</label>
                </div>

                <div class='txtField classIndexPageSecondHalf'>  
                    <select name='classTime' id='clockIndexPage' required>         
                        <option hidden></option>";  
                        for($i = 8; $i < 24; $i++){
                            //the format I have been using is with two digist so I'm just adding a 0 so, for instance,
                            //we get 08:00 instead of 8:00
                            if($i < 10){
                                $hour = "0".$i.":00";
                                $min = "0".$i.":30";
                            }

                            else{
                                $hour = $i.":00";
                                $min = $i.":30";
                            }                      
                    
                            echo"<option id=$hour value=$hour>$hour</option>";

                            if($i < 23){                                                                  //because I don't want them to be able to schedule pass 23:00 
                                echo"<option id=$min value=$min>$min</option>";
                            }
                        }
                    echo"
                    </select>
                    <span></span> 
                    <label for='classTime'>Class Time</label>
                </div>     

                <div class='txtField classIndexPageSecondHalf'> 
                    <select id='dropdownIndexPage' name='ctype' required>
                        <option hidden></option>                              
                        <option value='Online'>Online</option>
                        <option value='In-Person'>In-Person</option>                  
                    </select> 
                    <span></span>        
                    <label for='ctype'>Class Type</label>
                </div>
        
                <div class='txtField classIndexPageSecondHalf'>
                    <input type='text' id='zoomLinkIndexPage' name='czoomLink' required>  
                    <span></span>
                    <label for='czoomLink'>Zoom Link</label>
                </div>                            
                
                <input class='toggle classIndexPageSecondHalf' type='checkbox' id='ZoomLinktoggleHomePage' name='classToggle' required> 
                <input type='hidden' id='hiddendefaultZoomLinkHomePage' value='$defaultZoomLink'></input>                         
                <label id='toggleheadingClassIndexPage' class='toggleheadingClassIndexPage'>Default Link</label>   
                
                <div class='buttons-container classIndexPageSecondHalf'>
                    <button type='submit' id='submitButtonIndexPage' class='submit' name='AddClassesSubmitted'>Book</button>
                    <button type='button' class='cancel' onclick='closeIndexPageClassForm()'>Cancel</button>  
                    <input type='hidden' id='hiddenClassId-Edit-IndexPage' name='classId' value=''>                                 
                </div>        
            </form>   
        </div>         
";
}

// *********************************************************************************************************************************

function deleteStudentForm(){    
    echo"
        <div id='deleteStudent' class='modal'>
            <form action='' method='post' class='form-container delete animate'>
                <h1 class='deleteForm'>Delete Student</h1>  
                <p>Are you sure you want to delete this student?</p>  
                                
                <div class='buttons-container delete'>
                    <input type='hidden' id='hiddenStudentId' name='studentId' value=''>
                    <button type='submit' class='submit' name='studentDeleted'>Delete</button>                      
                    <button type='button' class='cancel' onclick='closeDeleteStudent()'>Cancel</button>
                </div>                  
            </form>
        </div>
    ";
}

// *********************************************************************************************************************************

function deleteClassForm(){    
    echo"
    <div id='deleteClass' class='modal'>
        <form action='' method='post' class='form-container delete animate'>
            <h1 class='deleteForm'>Delete Class</h1>  
            <p>Are you sure you want to delete this class?</p>  
                            
            <div class='buttons-container delete'>
                <input type='hidden' id='hiddenClassId-Delete' name='classId' value=''>
                <button type='submit' class='submit' name='classDeleted'>Delete</button>                    
                <button type='button' class='cancel' onclick='closeDeleteClass()'>Cancel</button>
            </div>                  
        </form>
    </div>
";   
}

// *********************************************************************************************************************************
