<?php
include('../include/initialize.php');
checkAdmin();
$adminId = $_SESSION['AdminId'];
$admin = getOneAdmin($adminId);

//All my select queries return an indexed array, but I'm updating my functions to work with 
//arrays indexed by PK. So, I will call the getIndexByPKArray() that updates the array to be 
//indexed by primary key.

$allStudents = getIndexByPKArray(getAllStudents(), 'StudentId');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_REQUEST['AddStudentSubmitted'])){   
        $errors = [];
        $errors = validateName($_REQUEST['ufname']);
        $errors = validateName($_REQUEST['ulname']); 
        
       if(sizeof($errors) == 0){

            $lichesslink = "https://lichess.org/@/".$_REQUEST['ulichess'];                                  //The user shoul type the username only, and this will concatinate that username to the link
            insertStudent($_REQUEST['ufname'], $_REQUEST['ulname'], $_REQUEST['uemail'], $_REQUEST['uphone'], $_REQUEST['urating'], $lichesslink);                                                                    
            header("location:?"); 
            exit();                                                                     
       }        
   
    }  

    if(isset($_REQUEST['studentDeleted'])){
        deleteStudent($_REQUEST['studentId']);                                                                   
        header("location:?");  
        exit();                                                             
    }  
}

echoHeader('Students');
echoPageLayout('My Students', "You have ".sizeof($allStudents)." students", $admin);
echoSearchBar("Students' List"); 
echoAddStudentButton('Add Student');  

if(!empty($allStudents)){   
    //calculate the information we need
    $remainingCredits = calcRemainingCredits();
    $futureClassesAmount = getIndexByPKArray(getFutureClassesAmount(), 'StudentId');  
    
    //add the information collected to the students array
    $allStudents = addRemainingCredits($remainingCredits, $allStudents);        
    $allStudents = addFutureClassesAmount($futureClassesAmount, $allStudents);         
    $allStudents = addDaysToNextClass($allStudents);           
          
    echoStudentTable($allStudents);       
}                                                        
               
else{
    echo"No students to show";                                                                       //This will be used properly later on(e.g. showing the correct message etc)
}

studentForm();
deleteStudentForm();

$jsFiles = "
    <script src='/include/JS/common_forms.js'></script>
    <script src='/include/JS/list_students.js'></script>
    ";

echoFooter($jsFiles); 
