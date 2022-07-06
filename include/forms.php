<?php

// --------------------------------------------------------------------------

function createNewStudentForm(){
    echo"         
    <div id='addStudentForm' class='modal'>        
        <form class='modal-content animate' action='' method='post'>
            <div class='imgcontainer'>
                <span onclick= document.getElementById('addStudentForm').style.display='none' class='close' title='Close Modal'>&times;</span>
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
                <button type='button' onclick= document.getElementById('addStudentForm').style.display='none' class='cancelbtn'>Cancel</button>
            </div>
        </form>
    </div>   
";
}

// --------------------------------------------------------------------------

function createAddCreditsForm(){
    echo"          
        <div class='form-popup' id='addCreditsForm'>
            <form action='' method='post' class='form-container'>                
                <button type='submit' class='btn' name='AddCreditsSubmitted'>Add</button>
                <button type='button' class='btn cancel' onclick='closeCreditForm()'>Close</button>

                <label for='camount'><b>Credits Amount</b></label>
                <input type='number' min='0' max='100' placeholder='0 - 100' name='camount' required>

                <label for='id'><b></b></label>
                <input type='hidden' name='id' value=$_REQUEST[studentId]>        
            </form>
        </div>
";
}

// --------------------------------------------------------------------------

function createAddClassForm(){
    echo"          
        <div class='form-popup' id='addClassForm'>
            <form action='' method='post' class='form-container'>
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
                <input type='hidden' name='id' value=$_REQUEST[studentId]>        
            </form>   
        </div>         
";
}

// --------------------------------------------------------------------------