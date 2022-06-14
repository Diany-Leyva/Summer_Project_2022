<?php
include('../include/initialize.php'); 
echoHeader('My Students');

$studentId = $_REQUEST['id'];                                             //We will work later on this: StudentId isn't passed in via $_REQUEST
$student = getStudent($studentId);                                        //I'm assuming there will be at least one student since I'm loading this page only if DB returned data in index 

echo"
    <h1>Class List for ".$student['First_Name']." ".$student['Last_Name']."</h1>
    ";

$classes = getAllClassesByStudent($studentId);

if(!isEmpty($classes)){ 
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
}

else{
    echo"No class booked!";                                               //This will be used properly later on(e.g. showing the correct message etc)
}

echoFooter();