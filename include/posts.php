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

 function getPostbyTopic($id, $topicId){
    $post = dbQuery("
      SELECT * 
      FROM posts 
      WHERE Post_Id = $id
      AND Topic_Id = $topicId"
  )->fetch();

  return $post;
}

//  function getAllAboutMePosts(){
//     return dbQuery("
//         SELECT * 
//         FROM `about_me`"
//     )->fetchAll();
// }

// function getAboutMePost($id){
//     return dbQuery("
//       SELECT * 
//       FROM `about_me` 
//       WHERE About_Me_Id = $id"
//   )->fetch();
// }

// function getAllProjects(){
//     return dbQuery("
//     SELECT *
//     FROM 'project'"
//     )->fetchAll();
// }

// function getProject($id){
//     return dbQuery("
//     SELECT * 
//     FROM `project` 
//     WHERE Project_Id = $id"
//     )->fetch();  
// }


    // function getAllAboutMePosts(){
    //     return [
    //        1=>[
    //            'Tittle'=> 'The beginning of a journey',           
    //            'Content' => 'Here I will talk more ....Here I will talk more ....</br>
    //                         Here I will talk more ....Here I will talk more ....</br>
    //                         Here I will talk more ....Here I will talk more ....</br>
    //                         Here I will talk more ....Here I will talk more ....</br>
    //                         Here I will talk more ....Here I will talk more ....</br>
    //                         Here I will talk more ....Here I will talk more ....</br>
    //                         Here I will talk more ....Here I will talk more ....',
    //            'DateCreated' => '12/01/2022'  
    //        ],  

    //        2=>[
    //         'Tittle'=> 'Why programming?',           
    //         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....',
    //         'DateCreated' => '12/01/2022'  
    //     ],  

    //     3=>[
    //         'Tittle'=> 'Dancing or not dancing?',           
    //         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....',
    //         'DateCreated' => '12/01/2022'  
    //     ], 

    //     4=>[
    //         'Tittle'=> 'Interests',           
    //         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....',
    //         'DateCreated' => '12/01/2022'  
    //     ], 

    //     5=>[
    //         'Tittle'=> 'Hobbies',           
    //         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....</br>
    //                      Here I will talk more ....Here I will talk more ....',
    //         'DateCreated' => '12/01/2022'  
    //     ] 
    //     ];
    // }

//     function getAboutMePost($id){
//        $aboutMePosts = getAllAboutMePosts();
//        return $aboutMePosts[$id];   
//    }


//    function getAllProjects(){
//     return [
//        1=>[
//            'Tittle'=> 'Project 1',           
//            'Content' => 'Here I will talk more ....Here I will talk more ....</br>
//                         Here I will talk more ....Here I will talk more ....</br>
//                         Here I will talk more ....Here I will talk more ....</br>
//                         Here I will talk more ....Here I will talk more ....</br>
//                         Here I will talk more ....Here I will talk more ....</br>
//                         Here I will talk more ....Here I will talk more ....</br>
//                         Here I will talk more ....Here I will talk more ....',
//            'DateCreated' => '12/01/2022'  
//        ],  

//        2=>[
//         'Tittle'=> 'Project 2',           
//         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....',
//         'DateCreated' => '12/01/2022'  
//     ],  

//     3=>[
//         'Tittle'=> 'Project 3',           
//         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....',
//         'DateCreated' => '12/01/2022'  
//     ], 

//     4=>[
//         'Tittle'=> 'Project 4',           
//         'Content' => 'Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....</br>
//                      Here I will talk more ....Here I will talk more ....',
//         'DateCreated' => '12/01/2022'  
//     ]    
//     ];
// }

// function getProject($id){
//    $projects = getAllProjects();
//    return $projects[$id];   
// }


// function getAllTopics(){
//     return [
//        1=>[
//            'Tittle'=> 'Blog',
//            'Heading' => 'Here is my',
//            'Link1' => 'Dance',
//            'Link2' => 'Motherhood',
//            'Link3' => 'Chess',
//            'Link4' => 'Minimalism',
//            'Link5' => 'Healthy Lifestyle'     
//        ],  

//        2=> [
//            'Tittle'=> 'About Me',
//            'Heading' => 'Here is information',
//            'Link1' => 'The beginning of a journey',
//            'Link2' => 'Why programming?',
//            'Link3' => 'Dancing or not dancing?',
//            'Link4' => 'Interests',
//            'Link5' => 'Hobbies'
//         ],             
  
//        3=>[
//            'Tittle'=> 'Projects',
//            'Heading' => 'Here are my',
//            'Link1' => 'Project1',
//            'Link2' => 'Project2',
//            'Link3' => 'Project3',           
//        ]   

//     ];
// }

// function getTopic($id){
//    $topic = getAllTopics();
//    return $topic[$id];   
// }













