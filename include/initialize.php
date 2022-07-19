<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();                                          

date_default_timezone_set("America/Chicago");

include_once('connect.php'); 
include_once('common_components.php');   
include_once('database_functions.php');
include_once('helper_functions.php'); 
include_once('validation_functions.php'); 
include_once('list_students_components.php'); 
include_once('student_profile_components.php'); 
include_once('index_components.php'); 
include_once('forms.php'); 
include_once('students.php'); 
include_once('classes.php'); 
include_once('login_components.php'); 




