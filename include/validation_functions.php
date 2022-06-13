<?php

function isEmpty($dataReturned){                            
   $data = [];
   
    if($dataReturned == NULL || $dataReturned == ''){
        $data['rows'] = 'Empty';                                    
    }                                                            
         
    return  $data;
}

