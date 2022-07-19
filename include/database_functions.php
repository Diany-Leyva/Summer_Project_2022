<?php

// *********************************************************************************************************************************
// Admin (this will be a query in the future)
// *********************************************************************************************************************************

function getAdmin(){
   return array('AdminId'=> '1', 'FirstName'=>'Yuniesky', 'LastName'=> 'Quesada', 'Email'=> 'yuniesky3184@yahoo.com', 'Password'=> '123');
}

// *********************************************************************************************************************************
//Students Table
// *********************************************************************************************************************************

function getAllStudents(){
    return dbQuery("
            SELECT *
            FROM students 
            ORDER BY StudentId     
    ")->fetchAll();   
}

// *********************************************************************************************************************************
//I will ask this in next jog but do I need to clean studentid here to prevent sql injection as well?
//even though this wasn't entered bu the user in the form? My guess is that yes we do, since someone could try to 
//manipulated in the URL or something like that

function getOneStudent($studentId){
    return dbQuery("
        SELECT *
        FROM students
        WHERE StudentId = $studentId;   
    ")->fetch();  
}

// *********************************************************************************************************************************
//Classes Table
// *********************************************************************************************************************************

function getAllClasses(){
    return dbQuery("
            SELECT *
            FROM classes
            ORDER BY StudentId, StartDate        
    ")->fetchAll();  
}

// *********************************************************************************************************************************

function getOneStudentClasses($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE StudentId = $studentId  
        ORDER BY StartDate
    ")->fetchAll();  
}

// *********************************************************************************************************************************

function getAllClassesAmount(){
    return dbQuery("
    SELECT StudentId, COUNT(StudentId) as ClassesAmount
    FROM classes   
    GROUP BY StudentId 
    ORDER BY StudentId   
")->fetchAll();
}

// *********************************************************************************************************************************

function getOneStudentClassesAmount($studentId){
    return dbQuery("
        SELECT StudentId, COUNT(StudentId) as ClassesAmount
        FROM classes 
        WHERE StudentId =  $studentId
        ORDER BY StudentId   
")->fetch();
}

// *********************************************************************************************************************************

function getAllStudentsWithClasses(){
    return dbQuery("
        SELECT ClassId, classes.StudentId, FirstName, LastName, Email, LichessLink, StartDate, ZoomLink, Type
        FROM classes, students
        WHERE classes.StudentId = students.StudentId      
        ORDER BY StudentId, StartDate
    ")->fetchAll();   
}

// *********************************************************************************************************************************
//I'm keeping this one for now but I might get rid of it later on
// *********************************************************************************************************************************

function getFutureClassesAmount(){
    return dbQuery("
    SELECT StudentId, COUNT(StudentId) as ClassesPending
    FROM classes 
    WHERE StartDate > CURRENT_DATE        
    GROUP BY StudentId 
    ORDER BY StudentId   
")->fetchAll();
}

// *********************************************************************************************************************************
//Credits Table
// *********************************************************************************************************************************

function getAllCredits(){
    return dbQuery("
        SELECT *
        FROM  credits       
        ")->fetchAll();
}

// *********************************************************************************************************************************

function getAllCreditsAmount(){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as CreditsAmount
        FROM credits 
        GROUP By StudentId
        ORDER BY StudentId
    ")->fetchAll();
}

// *********************************************************************************************************************************

function getOneStudentCreditAmount($student_Id){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as CreditsAmount
        FROM credits 
        WHERE StudentId = $student_Id
        GROUP By StudentId
        ORDER BY StudentId       
    ")->fetch();
}

// *********************************************************************************************************************************
//Refunds Table
// *********************************************************************************************************************************

function getAllRefundsAmount(){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as RefundAmount
        FROM refunds 
        GROUP By StudentId
        ORDER BY StudentId
    ")->fetchAll();
}

// *********************************************************************************************************************************

function getOneStudentRefundAmount($student_Id){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as RefundAmount
        FROM refunds 
        WHERE StudentId = $student_Id
        GROUP By StudentId
        ORDER BY StudentId       
    ")->fetch();
}

// *********************************************************************************************************************************
// Inserts
// *********************************************************************************************************************************

function insertStudent($fName, $lName, $email, $phone, $rating, $lichess){
    dbQuery("
        INSERT INTO students(FirstName, LastName, Email, Phone, ELO, LichessLink)
        VALUES(:cleanedfName, :cleanedlName, :cleanedemail, :cleanedphone, :cleanedrating, :cleanedlichess)
    ",  [
        'cleanedfName' => $fName,
        'cleanedlName' => $lName,
        'cleanedemail' => $email,
        'cleanedphone' => $phone,
        'cleanedrating' => $rating,
        'cleanedlichess' => $lichess
    ]);
}

// *********************************************************************************************************************************

function insertCredit($amount, $studentId){    
    dbQuery("
        INSERT INTO credits(Amount, StudentId)
        VALUES (:cleanedAmount, :cleanedStudentId)
    ", [
        'cleanedAmount' => $amount,
        'cleanedStudentId' => $studentId
    ]);
}

// *********************************************************************************************************************************

function insertClass($type, $link, $classDate, $studentId){    
    dbQuery("
        INSERT INTO classes(Type, ZoomLink, StartDate, StudentId)
        VALUES (:cleanedType, :cleanedLink, :cleanedClassDate, :cleanedStudentId)   
    ",  [
        'cleanedType' => $type,
        'cleanedLink' => $link,
        'cleanedClassDate' => $classDate,
        'cleanedStudentId' => $studentId       
    ]);
}

// *********************************************************************************************************************************

//If there is a better way to handle this please let me know. So, I have a credits table (Every row in that table in actually a purchase the student made).If
//we subtract a credit means we are returning money to the person which is a refund. So, I have a refund table whith the date of the refund and the amount. 
//The value will only be inserted in the table if the student has a remaing credit. So, before this query happens I need to check if the student has remaining credits
//But also, to calculate the remaining credits I need to check if there is any refund in the table for that student. 
// *********************************************************************************************************************************

function insertRefund($amount, $studentId){    
    dbQuery("
        INSERT INTO refunds(Amount, StudentId)
        VALUES (:cleanedAmount, :cleanedStudentId)
    ",  [
        'cleanedAmount' => $amount,
        'cleanedStudentId' => $studentId        
    ]);
}

// *********************************************************************************************************************************
// Deletions
// *********************************************************************************************************************************

function deleteStudent($studentId){    
    dbQuery("
        DELETE FROM students WHERE StudentId = :cleanedStudentId
    ",  [       
        'cleanedStudentId' => $studentId        
    ]);
}

// *********************************************************************************************************************************

function deleteClass($classId){    
    dbQuery("
        DELETE FROM classes WHERE ClassId = :cleanedClassId
    ",  [       
        'cleanedClassId' => $classId        
    ]);
}

// *********************************************************************************************************************************
// Updates
// *********************************************************************************************************************************

function updateStudent($fName, $lName, $email, $phone, $rating, $lichess, $studentId){
    dbQuery("
        UPDATE students
        SET FirstName=:cleanedFName, LastName=:cleanedLName, Email=:cleanedEmail, Phone=:cleanedPhone, ELO=:cleanedRating, LichessLink=:cleanedLichess
        WHERE StudentId = :cleanedStudentId
    ",  [
        'cleanedFName' => $fName,
        'cleanedLName' => $lName,
        'cleanedEmail' => $email,
        'cleanedPhone' => $phone,
        'cleanedRating' => $rating,
        'cleanedLichess' => $lichess,
        'cleanedStudentId' => $studentId
    ]);
}

// *********************************************************************************************************************************

function updatePrivateNotes($studentId, $notes){
    dbQuery("
        UPDATE students
        SET PrivateNotes = :cleanedNotes
        WHERE StudentId = :cleanedStudentId
    ",  [
        'cleanedStudentId' => $studentId,
        'cleanedNotes' => $notes       
    ]);
}

// *********************************************************************************************************************************

function updatePublicNotes($studentId, $notes){
    dbQuery("
        UPDATE students
        SET PublicNotes = :cleanedNotes
        WHERE StudentId = :cleanedStudentId
    ",  [
        'cleanedStudentId' => $studentId,
        'cleanedNotes' => $notes       
    ]);
}

// *********************************************************************************************************************************

function updateClass($classId, $type, $zoomLink, $classDate){
    dbQuery("
        UPDATE classes
        SET Type =:cleanedType, ZoomLink =:cleanedZoomLink, StartDate =:cleanedClassDate
        WHERE ClassId = :cleanedClassId
    ",  [
        'cleanedClassId' => $classId ,
        'cleanedType' => $type,
        'cleanedZoomLink' => $zoomLink,
        'cleanedClassDate' => $classDate           
    ]);
}

// *********************************************************************************************************************************













