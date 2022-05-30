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


function getAllTopics(){
         return [
            1=>[
                'Tittle'=> 'Blog',
                'Heading' => 'Here is my',
                'Link1' => 'Dance',
                'Link2' => 'Motherhood',
                'Link3' => 'Chess',
                'Link4' => 'Minimalism',
                'Link5' => 'Healthy Lifestyle'     
            ],  

            2=> [
                'Tittle'=> 'About Me',
                'Heading' => 'Here is information',
                'Link1' => 'The beginning of a journey',
                'Link2' => 'Why programming?',
                'Link3' => 'Dancing or not dancing?',
                'Link4' => 'Interests',
                'Link5' => 'Hobbies'
             ],             
       
            3=>[
                'Tittle'=> 'Projects',
                'Heading' => 'Here are my',
                'Link1' => 'Project1',
                'Link2' => 'Project2',
                'Link3' => 'Project3',           
            ]   

         ];
     }

     function getTopic($id){
        $topic = getAllTopics();
        return $topic[$id];   
    }