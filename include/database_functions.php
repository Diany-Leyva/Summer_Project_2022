<?php

function getAllStudents(){
    return dbQuery("
            SELECT *
            FROM students      
            ")->fetchAll();   
}

function getAllClasses(){
    return dbQuery("
            SELECT *
            FROM classes;   
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

