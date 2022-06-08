<?php
include('include/initialize.php');                               //Will include initialize later on
echoHeader('Admin');

$allStudents = getAllStudents();

echo"
    Here is a list of students:<br>
";

foreach($allStudents as $student){
    echo"
        Student ID: " .$student['Student_Id']."</br> 
        Firts Name:" .$student['First_Name']."</br> 
        Last Name:" .$student['Last_Name']."</br> 
        Email:" .$student['Email']."</br> 
        Phone:" .$student['Phone']."</br> 
        Date Created:" .$student['Date_Created']."</br> 
        Private Notes:" .$student['Private_Notes']."</br> 
    ";
}

echoFooter();