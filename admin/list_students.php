<?php
include('../include/initialize.php');  
echoHeader('Students');
$allStudents = getAllStudents(); 
echoHorizontalBar("My Students", "You have ".sizeof($allStudents)." students");
echoSearchBar("Students' List");                                                                

if(!isEmpty($allStudents)){     
    $studentWithCredits = getStudentsCredits();                                                 //gets the students and the credits total
    $studentWithClasses = getStudentsClasses(); 
    $futureClasses= unique_multidim_array(getFutureClasses(), 'Student_Id');                    //Remove any duplicate from the array based on the studentId, since the date 
                                                                                                //was sorted in the query, this will keep the date of the nearest class
    $credits = calculateStudentInfo($studentWithCredits, sizeof($allStudents), 'Credits', 0);   
    $classes = calculateStudentInfo($studentWithClasses, sizeof($allStudents), 'Classes', 0);  
    $dates = calculateStudentInfo($futureClasses, sizeof($allStudents), 'Date', currentDate());     
    $days = calculateDaysToNextClass($dates);

    echoTable($allStudents, $credits, $classes, $days);       
}                                                        
               
else{
    echo"No students to show";                                                                   //This will be used properly later on(e.g. showing the correct message etc)
}                                          

echoVerticalBar();
echoFooter();    
         


