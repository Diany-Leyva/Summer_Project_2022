<?php
$input1 = 6;
$input2 = 8;

if($input1 < $input2){
    $comparison = "greater than";  
}

else if($input1 > $input2){
    $comparison = "less than";    
}

else{
    $comparison = "equal to";   
}

echo "The number " .$input1. " is " .$comparison.  " the number " .$input2;


