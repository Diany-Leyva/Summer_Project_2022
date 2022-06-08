<?php

function getAllStudents(){
    $students = dbQuery("
        SELECT *
        FROM students        
    ")->fetchAll();

    return $students;
}


function getAllClasses(){
   $classes = dbQuery("
        SELECT *
        FROM classes;   
   ")->fetchAll();

   return $classes;
}