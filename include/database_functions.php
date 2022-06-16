<?php

function getAllStudents(){
    return dbQuery("
            SELECT *
            FROM students 
            ORDER BY Student_Id     
            ")->fetchAll();   
}

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

function getAllCredits(){
    return dbQuery("
        SELECT *
        FROM  credits       
        ")->fetchAll();
}

function getStudentsCredits(){
    return dbQuery("
        SELECT students.Student_Id, SUM(Amount) as Credits
        FROM students, credits 
        WHERE students.Student_Id = credits.Student_Id 
        GROUP By students.Student_Id
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