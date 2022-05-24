<?php

$randomValue = rand(-100,100);

if($randomValue > 0)
{
    $descriptionText = "positive";
}


else if($randomValue < 0)
{
    $descriptionText = "negative";
}


else
{
    $descriptionText = "zero";
}

echo "The random value of " .$randomValue. " is " .$descriptionText; 