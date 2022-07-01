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

function getStudent($studentId){
    return dbQuery("
        SELECT *
        FROM students
        WHERE StudentId = $studentId;   
    ")->fetch();  
}

//Classes Table
// --------------------------------------------------------------------------

// function getAllClasses(){
//     return dbQuery("
//             SELECT *
//             FROM classes
//             ORDER BY Class_Id        
//     ")->fetchAll();  
// }

// function getAllClassesByStudent($studentId){
//     return dbQuery("
//         SELECT *
//         FROM classes
//         WHERE Student_id = $studentId  
//         ORDER BY Start_Date
//     ")->fetchAll();  
// }

function getFutureClasses(){
    return dbQuery("
        SELECT StudentId, StartDate 
        FROM classes
        WHERE StartDate > CURRENT_DATE
        ORDER BY StudentId, StartDate
    ")->fetchAll();   
}

function getStudentsFutureClasses($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE StartDate > CURRENT_DATE
        AND StudentId = $studentId
        ORDER BY StudentId, StartDate
    ")->fetchAll();    
}

function getStudentPastClasses($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE StartDate < CURRENT_DATE
        AND StudentId = $studentId
        ORDER BY StudentId, StartDate
    ")->fetchAll();   
}

function getClassesAmount(){
    return dbQuery("
    SELECT StudentId, COUNT(StudentId) as ClassesAmount
    FROM classes   
    GROUP BY StudentId 
    ORDER BY StudentId   
")->fetchAll();
}

function getStudentClassesAmount($studentId){
    return dbQuery("
        SELECT StudentId, COUNT(StudentId) as ClassesAmount
        FROM classes 
        WHERE StudentId =  $studentId
        ORDER BY StudentId   
")->fetch();
}

function getFutureClassesAmount(){
    return dbQuery("
    SELECT StudentId, COUNT(StudentId) as ClassesPending
    FROM classes 
    WHERE StartDate > CURRENT_DATE        
    GROUP BY StudentId 
    ORDER BY StudentId   
")->fetchAll();
}

function getStudentClassesAmountThisMonth($studentId){
    return dbQuery("
        SELECT StudentId, COUNT(StudentId) Amount
        FROM classes
        WHERE StudentId = $studentId
        AND MONTH(Startdate) = MONTH(CURRENT_DATE)
        AND YEAR(Startdate) = YEAR(CURRENT_DATE)
        GROUP BY StudentId    
    ")->fetch();
}

function getStudentClassesAmountThisYear($studentId){
    return dbQuery("
        SELECT StudentId, COUNT(StudentId) as Amount
        FROM classes
        WHERE StudentId = $studentId        
        AND YEAR(StartDate) = YEAR(CURRENT_DATE)
        GROUP BY StudentId    
    ")->fetch();
}


//Credits Table
// --------------------------------------------------------------------------

// function getAllCredits(){
//     return dbQuery("
//         SELECT *
//         FROM  credits       
//         ")->fetchAll();
// }

function getCreditsAmount(){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as CreditsAmount
        FROM credits 
        GROUP By StudentId
        ORDER BY StudentId
    ")->fetchAll();
}

function getStudentCreditAmount($student_Id){
    return dbQuery("
        SELECT StudentId, SUM(Amount) as CreditsAmount
        FROM credits 
        WHERE StudentId = $student_Id
        GROUP By StudentId
        ORDER BY StudentId       
    ")->fetch();
}

//Students and Classes Table
// --------------------------------------------------------------------------
// function getAllStudentsWithClasses(){
//     return dbQuery("
//         SELECT S.Student_Id, First_Name, Last_Name, COUNT(C.Student_Id) as Classes
//         FROM classes C, students S
//         WHERE S.Student_Id = C.Student_Id
//         GROUP BY S.Student_Id
//         ORDER BY Student_Id
//     ")->fetchAll();
// }

//Students and Credits Table
// --------------------------------------------------------------------------

// function getStudentsCredits(){
//     return dbQuery("
//         SELECT S.Student_Id, First_Name, Last_Name, SUM(Amount) as Credits
//         FROM students S, credits C
//         WHERE S.Student_Id = C.Student_Id 
//         GROUP By S.Student_Id
//         ORDER BY Student_Id
//     ")->fetchAll();
// }

// function getAllStudentsWithCredits(){
//     return dbQuery("
//         SELECT students.Student_Id, First_Name, Last_Name, Email, Phone, ELO, SUM(Amount) as Credits
//         FROM students, credits 
//         WHERE students.Student_Id = credits.Student_Id 
//         GROUP By students.Student_Id, First_Name, Last_Name, Email, Phone, ELO;
//     ")->fetchAll();
// }

// Updates
// -------------------------------------------------------------------------- 

function insertStudent($fName, $lName, $email, $phone, $rating){
    dbQuery("
    INSERT INTO students(FirstName, LastName, Email, Phone, ELO)
    VALUES ('$fName', '$lName', '$email', '$phone', '$rating')
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

// Deletions
// -------------------------------------------------------------------------- 

function deleteStudent($studentId){    
    dbQuery("
        DELETE FROM students WHERE StudentId = $studentId
");
}







