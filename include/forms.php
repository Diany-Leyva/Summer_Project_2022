<?php

// --------------------------------------------------------------------------

function studentForm(){
    echo"         
    <div id='studentForm' class='modal'> 
        <form action='' method='post' class='form-container animate'>
            <div class='imgcontainer'>
                <img src='/images/Profile_Yuni.jpg' alt='profile_picture' class='avatar'>
            </div>
        
            <div class='container input-container'>
                <label for='ufname'><b>First Name</b></label>
                <input type='text' placeholder='First Name' name='ufname' id='fname' value='' required>
        
                <label for='ulname'><b>Last Name</b></label>
                <input type='text' placeholder='Last Name' name='ulname' id='lname' value='' required>
                    
                <label for='uemail'><b>Email</b></label>
                <input type='email' placeholder='Email' name='uemail' id='email' value='' required>
            
                <label for='uphone'><b>Phone</b></label>
                <input type='tel' name='uphone' placeholder='999-999-9999' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' id='phone' value='' required>

                <label for='urating'><b>ELO Rating</b></label>
                <input type='number' min='0' max='3000'placeholder='ELO' name='urating' id='rating' value='' required>
                
                <label for='ulichess'><b>Username</b></label>
                <input type='text' placeholder='Lichess Username' name='ulichess' id='lichess' value='' required>
            </div>
        
            <div class='buttons-container' style='background-color:#f1f1f1'>
                <button type='submit' class='submit' name='AddStudentSubmitted'>Add</button>
                <button type='button' class='cancel' onclick= 'closeStudentForm()'>Cancel</button>
            </div>
        </form>
    </div>   
";
}

// --------------------------------------------------------------------------

function creditsForm(){

    echo"          
        <div id='creditsForm' class='modal'>
            <form action='' method='post' class='form-container animate'> 
                <header class='container'>
                Credits              
                </header>  

                <div class='container input-container'>
                    <label for='camount'><b>Credits Amount</b></label>
                    <input id='maxCredit' type='number' min='1' max='100' placeholder='1 - 100' name='camount' required>
                </div> 

                <div class='buttons-container'>
                    <input type='hidden' id='hiddenValue' name='hiddenValue' value=''>
                    <button type='submit' class='submit' name='changeCreditsSubmitted'>Submit</button>               
                    <button type='button' class='cancel' onclick='closeCreditForm()'>Cancel</button>
                </div>
            </form>
        </div>
";
}

// --------------------------------------------------------------------------
//I'm sure that as I get more familiar with js libraries I will be able to
//updated this date-time picker :). I'm literally just using a list for time
//but I don't want to allow 4:35Pm as a time for instance, I just want :00 or
// :30 as an option 
// --------------------------------------------------------------------------
function classForm(){
    $today = date('Y-m-d');
    echo"          
        <div id='classForm' class='modal'>
            <form action='' method='post' class='form-container animate'>  
                <header class='container'>
                        Book Class                
                </header> 

                <div class='container input-container'>
                <label for='ctype'>Class Type</label>
                <select id='dropdown' name='ctype'>                   
                    <option value='Online'>Online</option>
                    <option value='In-Person'>In-Person</option>                  
                </select>   

                <label for='classDate'>Class Date</label>
                <input type='date' id='ClassDate' name='classDate' min='$today'required>

                <label for='classTime'>Class Time</label>
                <select name='classTime' id='clock'>";         
                         
                    for($i = 8; $i < 24; $i++){
                        $meridiam = 'AM';                  
                      
                        if($i > 11){
                            $meridiam = 'PM';
                        }

                        $hour = $i.":00";
                        $min = $i.":30";
                   
                        echo"<option id=$hour value=$hour>$hour $meridiam</option>";
                        echo"<option id=$min value=$min>$min $meridiam</option>";
                    }
                    echo"
                </select>        

                <label for='czoomLink'><b>Zoom Link</b></label>
                <input type='text' id='zoomLink' placeholder='Link' name='czoomLink' required>            
                </div>        
                                
                <div class='buttons-container'>
                    <button type='submit' id='submitButton' class='submit' name='AddClassesSubmitted'>Book</button>
                    <button type='button' class='cancel' onclick='closeClassForm()'>Cancel</button>  
                    <input type='hidden' id='hiddenClassId-Edit' name='classId' value=''>                                 
                </div>      
            </form>   
        </div>         
";
}

// --------------------------------------------------------------------------

function deleteStudentForm(){    
    echo"
        <div id='deleteStudent' class='modal'>
                <form action='' method='post' class='form-container animate'>
                    <header class='container'>
                        Delete Student                  
                        <p>Are you sure you want to delete this student?</p>
                    </header> 
                    <div class='buttons-container'>
                            <input type='hidden' id='hiddenStudentId' name='stdId' value=''>
                            <button type='submit' class='submit' name='studentDeleted'>Delete</button>                      
                            <button type='button' class='cancel' onclick='closeDeleteStudent()'>Cancel</button>
                    </div>                  
                </form>
        </div>
    ";
}

// -------------------------------------------------------------------------- 

function deleteClassForm(){    
    echo"
        <div id='deleteClass' class='modal'>
                <form action='' method='post' class='form-container animate'>
                    <header class='container'>
                        Delete Class                  
                        <p>Are you sure you want to delete this class?</p>
                    </header> 
                    <div class='buttons-container'>
                            <input type='hidden' id='hiddenClassId-Delete' name='classId' value=''>
                            <button type='submit' class='submit' name='classDeleted'>Delete</button>                      
                            <button type='button' class='cancel' onclick='closeDeleteClass()'>Cancel</button>
                    </div>                  
                </form>
        </div>
    ";
}

// -------------------------------------------------------------------------- 
