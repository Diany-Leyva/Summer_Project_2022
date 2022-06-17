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

function getStudentsNumber(){
    return dbQuery("
        SELECT COUNT(Student_Id) AS number 
        FROM students
        ")->fetch();
}


//Classes Table
// --------------------------------------------------------------------------

function getAllClasses(){
    return dbQuery("
            SELECT *
            FROM classes
            ORDER BY Class_Id        
            ")->fetchAll();  
}

function getAllClassesByStudent($studentId){
    return dbQuery("
        SELECT *
        FROM classes
        WHERE Student_id = $studentId  
        ORDER BY Start_Date
        ")->fetchAll();  
}

function getFutureClasses(){
    return dbQuery("
        SELECT Student_Id, Start_Date as Date
        FROM classes
        WHERE Start_Date > CURRENT_DATE
        ORDER BY Student_Id, Start_Date
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

//Students and Classes Table
// --------------------------------------------------------------------------

function getStudentsClasses(){
    return dbQuery("
        SELECT S.Student_Id, COUNT(C.Student_Id) as Classes
        FROM classes C, students S
        WHERE S.Student_Id = C.Student_Id
        GROUP BY S.Student_Id
        ORDER BY Student_Id
    ")->fetchAll();
}

//Students and Credits Table
// --------------------------------------------------------------------------

function getStudentsCredits(){
    return dbQuery("
        SELECT S.Student_Id, SUM(Amount) as Credits
        FROM students S, credits C
        WHERE S.Student_Id = C.Student_Id 
        GROUP By S.Student_Id
        ORDER BY Student_Id
    ")->fetchAll();
}


// function getAllStudentsWithCredits(){
//     return dbQuery("
//         SELECT students.Student_Id, First_Name, Last_Name, Email, Phone, ELO, SUM(Amount) as Credits
//         FROM students, credits 
//         WHERE students.Student_Id = credits.Student_Id 
//         GROUP By students.Student_Id, First_Name, Last_Name, Email, Phone, ELO;
//     ")->fetchAll();
// }



