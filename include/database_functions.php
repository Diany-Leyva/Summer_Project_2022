<?php

//Students Table
// --------------------------------------------------------------------------

function getAllStudents(){
    return dbQuery("
            SELECT *
            FROM students 
            ORDER BY StudentId     
    ")->fetchAll();   
}

function getOneStudent($studentId){
    return dbQuery("
        SELECT *
        FROM students
        WHERE StudentId = $studentId;   
    ")->fetch();  
}

//Classes Table
// --------------------------------------------------------------------------

function getAllClasses(){
    return dbQuery("
            SELECT *
            FROM classes
            ORDER BY StudentId, StartDate        
    ")->fetchAll();  
}

function getOneStudentClasses($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE StudentId = $studentId  
        ORDER BY StartDate
    ")->fetchAll();  
}

function getAllClassesAmount(){
    return dbQuery("
    SELECT StudentId, COUNT(StudentId) as ClassesAmount
    FROM classes   
    GROUP BY StudentId 
    ORDER BY StudentId   
")->fetchAll();
}

function getOneStudentClassesAmount($studentId){
    return dbQuery("
        SELECT StudentId, COUNT(StudentId) as ClassesAmount
        FROM classes 
        WHERE StudentId =  $studentId
        ORDER BY StudentId   
")->fetch();
}

function getAllStudentsWithClasses(){
    return dbQuery("
        SELECT ClassId, classes.StudentId, FirstName, LastName, Email, LichessLink, StartDate, ZoomLink, Type
        FROM classes, students
        WHERE classes.StudentId = students.StudentId      
        ORDER BY StudentId, StartDate
    ")->fetchAll();   
}

//I'm keeping this one for now but I might get rid of it later on
function getFutureClassesAmount(){
    return dbQuery("
    SELECT StudentId, COUNT(StudentId) as ClassesPending
    FROM classes 
    WHERE StartDate > CURRENT_DATE        
    GROUP BY StudentId 
    ORDER BY StudentId   
")->fetchAll();
}

//Credits Table
// --------------------------------------------------------------------------

function getAllCredits(){
    return dbQuery("
        SELECT *
        FROM  credits       
        ")->fetchAll();
}

function getAllCreditsAmount(){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as CreditsAmount
        FROM credits 
        GROUP By StudentId
        ORDER BY StudentId
    ")->fetchAll();
}

function getOneStudentCreditAmount($student_Id){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as CreditsAmount
        FROM credits 
        WHERE StudentId = $student_Id
        GROUP By StudentId
        ORDER BY StudentId       
    ")->fetch();
}

//Refunds Table
// --------------------------------------------------------------------------
function getAllRefundsAmount(){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as RefundAmount
        FROM refunds 
        GROUP By StudentId
        ORDER BY StudentId
    ")->fetchAll();
}

function getOneStudentRefundAmount($student_Id){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as RefundAmount
        FROM refunds 
        WHERE StudentId = $student_Id
        GROUP By StudentId
        ORDER BY StudentId       
    ")->fetch();
}

// Inserts
// -------------------------------------------------------------------------- 

function insertStudent($fName, $lName, $email, $phone, $rating, $lichess){
    dbQuery("
    INSERT INTO students(FirstName, LastName, Email, Phone, ELO, LichessLink)
    VALUES ('$fName', '$lName', '$email', '$phone', '$rating', '$lichess')
");
}

function insertCredit($amount, $studentId){    
    dbQuery("
    INSERT INTO credits(Amount, StudentId)
    VALUES ('$amount', '$studentId')
");
}

function insertClass($type, $link, $classDate, $studentId){    
    dbQuery("
    INSERT INTO classes(Type, ZoomLink, StartDate, StudentId)
    VALUES ('$type', '$link', '$classDate', '$studentId')   
");
}

//If there is a better way to handle this please let me know. So, I have a credits table (Every row in that table in actually a purchase the student made).If
//we subtract a credit means we are returning money to the person which is a refund. So, I have a refund table whith the date of the refund and the amount. 
//The value will only be inserted in the table if the student has a remaing credit. So, before this query happens I need to check if the student has remaining credits
//But also, to calculate the remaining credits I need to check if there is any refund in the table for that student. 
function insertRefund($amount, $studentId){    
    dbQuery("
    INSERT INTO refunds(Amount, StudentId)
    VALUES ('$amount', '$studentId')
");
}

// Deletions
// -------------------------------------------------------------------------- 

function deleteStudent($studentId){    
    dbQuery("
        DELETE FROM students WHERE StudentId = $studentId
");
}

function deleteClass($classId){    
    dbQuery("
        DELETE FROM classes WHERE ClassId = $classId
");
}


// Updates
// -------------------------------------------------------------------------- 

function updateStudent($fName, $lName, $email, $phone, $rating, $lichess, $studentId){
    dbQuery("
    UPDATE students
    SET FirstName ='$fName', LastName='$lName', Email='$email', Phone='$phone', ELO='$rating', LichessLink ='$lichess' 
    WHERE StudentId = '$studentId'
");
}

function updateNotes($studentId, $notes, $attribute){
    dbQuery("
    UPDATE students
    SET $attribute ='$notes' 
    WHERE StudentId = '$studentId'
");
}

function updateClass($classId, $type, $zoom, $date){
    dbQuery("
    UPDATE classes
    SET Type ='$type', ZoomLink ='$zoom', StartDate ='$date' 
    WHERE ClassId = '$classId'
");
}













