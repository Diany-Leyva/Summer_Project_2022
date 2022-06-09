<?php
include('../include/initialize.php'); 
echoHeader('Classes');

$studentId = $_REQUEST['id'];
$classes = getAllClassesByStudent($studentId);
$student = getStudent($studentId);

echo"
    <h1>Class List for ".$student['First_Name']." ".$student['Last_Name']."</h1>
    ";

foreach($classes as $class){
    echo" 
    <div>
        <b>Class ID: </b>" .$class['Class_Id']."</br> 
        <b>Class Type: </b>" .$class['Type']."</br> 
        <b>Zoom Link: </b>" .$class['Zoom_Link']."</br>     
        <b>Class Date: </b>" .formatDate($class['Start_Date'], 'm/d/Y H:i A')."</br> 
        <b>Duration: </b>" .$class['Duration']." minutes </br> 
    </div>        
    <br></br>        
    ";
}

echoFooter();