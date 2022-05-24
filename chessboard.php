<?php 

echo "<html>                                                                                                      
        <head>
            <title>My Chess Board</title>                                                         
            <link href='ChessBoard.css' rel='stylesheet'>
        </head>
        
        <body>";                                                                                          
            $white = "white";
            $black = "black";

            for($i = 1; $i < 64/2 + 1; $i++)
            {
                if($i == 1 or $i % 4 == 1){
                    echo "<div class='board'>";
                }     

                echo "<h1 class='Square' style='background-color: $white;'></h1>
                    <h1 class='Square' style='background-color: $black;'></h1>"; 

                if($i != 0 and $i % 4 == 0){
                    echo "</div>";       
                    $temp = $white;
                    $white = $black;
                    $black = $temp; 
                }       
            }    

    echo "</body>   
    </html>"; 
    
    



// php and html attempt

<html>                                                                                                      
<head>
    <title>My Chess Board</title>                                                             
    <link href="ChessBoard.css" rel="stylesheet">
</head>

<body>                                                                                                  

  <?php $white = "#ffffff";
        $black = "#000000";?>

  <?php for($i = 1; $i < 64/2 + 1; $i++) :?>
    <?php if($i == 1 or $i % 4 == 1) :?>
    <div class="board">

    <h1 class="Square" style="background-color: <?php $white ?>;"></h1>
    <h1 class="Square" style="background-color: <?php $black ?>;"></h1>  
 
    <?php if($i != 0 and $i % 4 == 0) :?>
    </div>    
    $temp = $white;
    $white = $black;
    $black = $temp;?>
  <?php endfor; ?>                    
    
</body>    
</html>









