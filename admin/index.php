<?php
include('../include/initialize.php');     
           
echoHeader('List of Students');

$allStudents = getAllStudents();

echo"
<h1>Students List</h1>    
";



foreach($allStudents as $student){
    echo"
        <b>Student ID: </b>" .$student['Student_Id']."</br> 
        <b>First Name: </b> " .$student['First_Name']."</br> 
        <b>Last Name: </b>" .$student['Last_Name']."</br> 
        <b>Email: </b>" .$student['Email']."</br> 
        <b>Phone: </b>" .$student['Phone']."</br> 
        <b>Date Created: </b>" .$student['Date_Created']."</br> 
        <b>Private Notes: </b>" .$student['Private_Notes']."</br>";        
        passVariableThroughLink('students.php', $student['Student_Id'], 'Class booked');
        echo"
        <br></br>
    ";
}

echoFooter();