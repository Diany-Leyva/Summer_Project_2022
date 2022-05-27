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
      WHERE PostId = $id"
    )->fetch();
 
    //  return $post;

 }
//  function getLinkList(){
//      return [
//          1=>['tittle'=> '',
//             'heading1' => '',
//             'heading2' => '',


//          ],

//          2=>[

//         ],

//         3=>[

//         ],

//         4=>[

//         ],

//         5=>[

//         ],
//      ];
//  }