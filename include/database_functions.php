<?php

//Students Table
// --------------------------------------------------------------------------

function getAllStudents(){
    return dbQuery("
            SELECT *
            FROM students 
            ORDER BY Student_Id     
    ")->fetchAll();   
}

function getStudent($studentId){
    return dbQuery("
        SELECT *
        FROM students
        WHERE Student_Id = $studentId;   
    ")->fetch();  
}

// function getStudentsNumber(){
//     return dbQuery("
//         SELECT COUNT(Student_Id) AS number 
//         FROM students
//         ")->fetch();
// }


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
        SELECT Student_Id, Start_Date as Date
        FROM classes
        WHERE Start_Date > CURRENT_DATE
        ORDER BY Student_Id, Start_Date
    ")->fetchAll();   
}

function getFutureClassesbyStudent($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE Start_Date > CURRENT_DATE
        AND Student_Id = $studentId
        ORDER BY Student_Id, Start_Date
    ")->fetchAll();    
}

function getStudentPastClasses($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE Start_Date < CURRENT_DATE
        AND Student_Id = $studentId
        ORDER BY Student_Id, Start_Date
    ")->fetchAll();   
}


function getClassesAmount(){
    return dbQuery("
    SELECT Student_Id, COUNT(Student_Id) as Classes_Amount
    FROM classes   
    GROUP BY Student_Id 
    ORDER BY Student_Id   
")->fetchAll();
}

function getStudentClassesAmount($studentId){
    return dbQuery("
        SELECT Student_Id, COUNT(Student_Id) as Classes_Amount
        FROM classes 
        WHERE Student_Id =  $studentId
        ORDER BY Student_Id   
")->fetch();
}

function getFutureClassesAmount(){
    return dbQuery("
    SELECT Student_Id, COUNT(Student_Id) as Classes_Pending
    FROM classes 
    WHERE Start_Date > CURRENT_DATE        
    GROUP BY Student_Id 
    ORDER BY Student_Id   
")->fetchAll();
}

function getStudentClassesAmountThisMonth($studentId){
    return dbQuery("
        SELECT Student_Id, COUNT(Student_Id) Amount
        FROM classes
        WHERE Student_Id = $studentId
        AND MONTH(Start_date) = MONTH(CURRENT_DATE)
        AND YEAR(Start_date) = YEAR(CURRENT_DATE)
        GROUP BY Student_Id    
    ")->fetch();
}

function getStudentClassesAmountThisYear($studentId){
    return dbQuery("
        SELECT Student_Id, COUNT(Student_Id) as Amount
        FROM classes
        WHERE Student_Id = $studentId        
        AND YEAR(Start_date) = YEAR(CURRENT_DATE)
        GROUP BY Student_Id    
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
        SELECT Student_Id, SUM(Amount) as Credits_Amount
        FROM credits 
        GROUP By Student_Id
        ORDER BY Student_Id
    ")->fetchAll();
}

function getStudentCreditAmount($student_Id){
    return dbQuery("
        SELECT Student_Id, SUM(Amount) as Credits_Amount
        FROM credits 
        WHERE Student_Id = $student_Id
        GROUP By Student_Id
        ORDER BY Student_Id       
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

function updatestudents_TableDB(){
    dbQuery("
    INSERT INTO students(First_Name, Last_Name, Email, Phone, ELO)
    VALUES ('$_REQUEST[ufname]', '$_REQUEST[ulname]', '$_REQUEST[uemail]', '$_REQUEST[uphone]', '$_REQUEST[urating]')
");
}


function updateCredits_TableDB(){    
    dbQuery("
    INSERT INTO credits(Amount, Student_Id)
    VALUES ('$_REQUEST[camount]', '$_REQUEST[id]')
");
}

function updateClasses_TableDB(){    
    dbQuery("
    INSERT INTO classes(Type, Zoom_Link, Start_Date, Student_Id)
    VALUES ('$_REQUEST[ctype]', '$_REQUEST[czoomLink]', '$_REQUEST[classDate]', '$_REQUEST[id]')
");
}








