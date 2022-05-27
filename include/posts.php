<?php

function getAllBlogPosts(){
    
    $post = dbQuery("
        SELECT * 
        FROM posts
    ")->fetchAll();

    return $post;      
 } 
    
function getPost($id){
      return dbQuery("
      SELECT * 
      FROM `posts` 
      WHERE Post_Id = $id"
    )->fetch();
 }


 