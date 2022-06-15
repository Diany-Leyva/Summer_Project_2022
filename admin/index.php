<?php
include('../include/initialize.php');  

echoHeader('Students', getStudentsNumber()['number']);

// $allStudents = getAllStudents();

// if(!isEmpty($allStudents)){ 
//     foreach($allStudents as $student){                                                  
//         echo"<div>                                                                                  
//                 Student ID: </b>" .$student['Student_Id']."</br> 
//                 First Name: </b> " .$student['First_Name']."</br> 
//                 Last Name: </b>" .$student['Last_Name']."</br> 
//                 Email: </b>" .$student['Email']."</br> 
//                 Phone: </b>" .$student['Phone']."</br> 
//                 Date Created: </b>" .formatDate($student['Date_Created'], "m/d/y")."</br> 
//                 Private Notes: </b>" .$student['Private_Notes']."</br>";                
//                 passVariableThroughLink('list_students.php', $student['Student_Id'], 'Classes booked');
//                 echo"
//             </div>
//             <br></br>
//         ";
//     }  
// }

// else{
//     echo"No students to show";              //This will be used properly later on(e.g. showing the correct message etc)
// }
                                                  
 

echoFooter();