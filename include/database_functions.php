<?php

function updateNewsletter_Subscriber_TableDB(){
    dbQuery("
    INSERT INTO newsletter_subscriber(Name, Email)
    VALUES ('$_REQUEST[Name]', '$_REQUEST[Email]' )
");
}

function updateComments_TableDB($userId){
    dbQuery("
    INSERT INTO comments(Content, User_Id, Post_Id)
    VALUES ('$_REQUEST[Content]', $userId, '$_REQUEST[Post_Id]')
");
}

function updateUser_TableDB(){
    dbQuery("
    INSERT INTO users(Name, Email, Website)
    VALUES ('$_REQUEST[Name]', '$_REQUEST[Email]', '$_REQUEST[Website]' )
");
}

function getNewUserId($name, $email){
    $id = dbQuery("
        SELECT User_Id 
        FROM users
        WHERE Name = $name 
        AND Email = $email  
    ")->fetch();

    return $id;
}