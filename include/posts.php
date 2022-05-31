<?php

function getAllTopics(){
    $topics = dbQuery("
        SELECT * 
        FROM topics
    ")->fetchAll();

    return $topics;   
}

function getTopic($id){
    $topic = dbQuery("
        SELECT * 
        FROM topics 
        WHERE Topic_Id = $id"
    )->fetch();

return $topic; 
}

function getAllPosts(){
    $posts = dbQuery("
        SELECT * 
        FROM posts
    ")->fetchAll();

    return $posts;      
 } 
    
function getPost($id){
      $post = dbQuery("
        SELECT * 
        FROM posts 
        WHERE Post_Id = $id"
    )->fetch();

    return $post;
 }

 function getAllPostsbyTopic($topicId){
    $posts = dbQuery("
      SELECT * 
      FROM posts 
      WHERE Topic_Id = $topicId"
  )->fetchAll();

  return $posts;
}

function getPostbyTopic($topicId){
    $post = dbQuery("
      SELECT * 
      FROM posts 
      WHERE Topic_Id = $topicId"
  )->fetch();

  return $post;
}

