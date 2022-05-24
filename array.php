<?php

$employees =[
    [
     'name' => 'Tyler',                       
     'phone' => '123-123-2345'
     ],
     [
       'name' => 'Diany', 
       'phone' => '123-123-2345'
     ],
    [
      'name' => 'Michel', 
     'phone' => '123-123-2345'
    ]
 ];
    
    
    


$count = 1;

foreach($employees as $individualEmployee){
    echo "
        <div style]= 'font-size: 12px; color:#999;' >Employee #" .$count. "</div>
        <div style]= 'font-size: 16px; font-weight:bold;'>" .$individualEmployee['name']."</div>    
        <div style]= 'font-size: 14px; margin-bottom: 20px;' >" .$individualEmployee['phone']."</div>  
    ";

    $count++;
}

\

