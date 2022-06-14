<?php

function isEmpty($dataReturned){                            
   $isEmpty = false;
   
    if($dataReturned == NULL || $dataReturned == ''){
        $isEmpty = true;                                      
    }                                                            
         
    return  $isEmpty;
}

//At Webster we need to follow programming satndars, so we need to declare a boolean variable and then return it.
//But I know I can also do the approach below. I wonder what approach is more common in real life?

// function isEmpty($dataReturned){                         
     
//     if($dataReturned == NULL || $dataReturned == ''){
//         return true;                                      
//     }                                                            
         
//     return  false;
// }

