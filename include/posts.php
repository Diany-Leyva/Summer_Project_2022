<?php

function getAllBlogPosts(){
    
    $post = dbQuery("
        SELECT * 
        FROM posts
    ")->fetchAll();

    return $post;      
 } 
    
function getID($id){
      return dbQuery("
      SELECT * 
      FROM `posts` 
      WHERE PostId = $id"
    )->fetch();
 }
