<?php
include('../include/initialize.php');  
echoHeader('Students');

echo"
        <h1>Students List</h1>    
    ";

$allStudents = getAllStudents();

if(!isEmpty($allStudents)){ 
    foreach($allStudents as $student){                                                  
        echo"                                                                                     
        <div>
            <b>Student ID: </b>" .$student['Student_Id']."</br> 
            <b>First Name: </b> " .$student['First_Name']."</br> 
            <b>Last Name: </b>" .$student['Last_Name']."</br> 
            <b>Email: </b>" .$student['Email']."</br> 
            <b>Phone: </b>" .$student['Phone']."</br> 
            <b>Date Created: </b>" .formatDate($student['Date_Created'], "m/d/y")."</br> 
            <b>Private Notes: </b>" .$student['Private_Notes']."</br>";                
            passVariableThroughLink('students.php', $student['Student_Id'], 'Classes booked');
            echo"
        </div>
        <br></br>
        ";
    }  
}

else{
    echo"No students to show";              //This will be used properly later on(e.g. showing the correct message etc)
}
                                                  
 

echoFooter();