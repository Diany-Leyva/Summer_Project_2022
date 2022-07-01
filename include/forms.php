<?php

// --------------------------------------------------------------------------

function createNewStudentForm(){
    echo"         
    <div id='addStudentForm' class='modal'> 
        <form action='' method='post' class='form-container animate'>
            <div class='imgcontainer'>
                <img src='/images/Profile_Yuni.jpg' alt='profile_picture' class='avatar'>
            </div>
        
            <div class='container input-container'>
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
        
            <div class='buttons-container' style='background-color:#f1f1f1'>
                <button type='submit' class='submit' name='AddStudentSubmitted'>Add</button>
                <button type='button' class='cancel' onclick= document.getElementById('addStudentForm').style.display='none'>Cancel</button>
            </div>
        </form>
    </div>   
";
}

// --------------------------------------------------------------------------

function createAddCreditsForm(){
    echo"          
        <div id='addCreditsForm' class='modal'>
            <form action='' method='post' class='form-container animate'> 
                <header class='container'>
                Add Credits              
                </header>  

                <div class='container input-container'>
                    <label for='camount'><b>Credits Amount</b></label>
                    <input type='number' min='0' max='100' placeholder='0 - 100' name='camount' required>
                </div> 

                <div class='buttons-container'>
                    <button type='submit' class='submit' name='AddCreditsSubmitted'>Add</button>
                    <button type='button' class='cancel' onclick='closeCreditForm()'>Cancel</button>
                </div>
            </form>
        </div>
";
}

// --------------------------------------------------------------------------

function createAddClassForm(){
    echo"          
        <div id='addClassForm' class='modal'>
            <form action='' method='post' class='form-container animate'>  
                <header class='container'>
                        Book Class                
                </header> 

                <div class='container input-container'>
                <label for='ctype'>Class Type</label>
                <select id='dropdown' name='ctype'>
                    <option value='Online'>Online</option>
                    <option value='In Person'>In Person</option>                  
                </select>   

                <label for='classDate'>Class Date</label>
                <input type='datetime-local' name='classDate' required> 

                <label for='czoomLink'><b>Zoom Link</b></label>
                <input type='text' placeholder='Link' name='czoomLink' required>            
                </div>        
                                
                <div class='buttons-container'>
                    <button type='submit' class='submit' name='AddClassesSubmitted'>Book</button>
                    <button type='button' class='cancel' onclick='closeClassForm()'>Cancel</button>
               
                </div>      
            </form>   
        </div>         
";
}

// --------------------------------------------------------------------------

function createDeleteForm(){    
    echo"
        <div id='addDeleteForm' class='modal'>
                <form action='' method='post' class='form-container animate'>
                    <header class='container'>
                        Delete Student                  
                        <p>Are you sure you want to delete this student?</p>
                    </header> 
                    <div class='buttons-container'>
                            <input type='hidden' id='hiddenStudentId' name='stdId' value=''>
                            <button type='submit' class='submit' name='studentDeleted'>Delete</button>                      
                            <button type='button' class='cancel' onclick='closeDeleteForm()'>Cancel</button>
                    </div>                  
                </form>
        </div>
    ";
}

// -------------------------------------------------------------------------- 


