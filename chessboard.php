<?php 

echo "<html>                                                                                                      
        <head>
            <title>My Chess Board</title>                                                         
            <link href='ChessBoard.css' rel='stylesheet'>
        </head>
        
        <body>";                                                                                          
            $white = "white";
            $black = "#292929";

            for($i = 1; $i < 64/2 + 1; $i++)
            {
                if($i == 1 or $i % 4 == 1){
                    echo "<div class='board'>";
                }     

                echo "<h1 class='Square' style='background-color: $white;'>";
                
                if($i == 1){
                    echo "<img src='images/white_rook.svg' alt='white_rook' class='image'>";
                }

                else if($i == 2){
                    echo "<img src='images/white_bishop.svg' alt='white_bishop' class='image'>";
                }

                else if($i == 3){
                    echo "<img src='images/white_queen.svg' alt='white_queen' class='image'>";
                }

                else if($i == 4){
                    echo "<img src='images/white_knight.svg' alt='white_knight' class='image'>";
                }

                else if($i >= 5 && $i <=8){
                    echo "<img src='images/white_pawn.svg' alt='white_pawn' class='image'>";
                }

                else if($i >= 25 && $i <= 28){
                    echo "<img src='images/black_pawn.svg' alt='black_pawn' class='image'>";
                }

                else if($i == 29){
                    echo "<img src='images/Black_Rook.svg' alt='Black Rook' class='image'>";
                }

                else if($i == 30){
                    echo "<img src='images/black_bishop.svg' alt='black_bishop' class='image'>";
                }

                else if($i == 31){
                    echo "<img src='images/black_queen.svg' alt='black_queen' class='image'>";
                }

                else if($i == 32){
                    echo "<img src='images/black_knight.svg' alt='black_queen' class='image'>";
                }

                echo "</h1>";
                
                echo"<h1 class='Square' style='background-color: $black;'>"; 

                if($i == 1){
                    echo "<img src='images/white_knight.svg' alt='images/knight' class='image'>";
                }

                else if($i == 2){
                    echo "<img src='images/white_king.svg' alt='white_king' class='image'>";
                }

                else if($i == 3){
                    echo "<img src='images/white_bishop.svg' alt='Black Rook' class='image'>";
                }

                else if($i == 4){
                    echo "<img src='images/white_rook.svg' alt='Black Rook' class='image'>";
                }

                else if($i >= 5 && $i <=8){
                    echo "<img src='images/white_pawn.svg' alt='white_pawn' class='image'>";
                }

                else if($i >= 25 && $i <= 28){
                    echo "<img src='images/black_pawn.svg' alt='black_pawn' class='image'>";
                }

                else if($i == 29){
                    echo "<img src='images/black_knight.svg' alt='black_knight' class='image'>";
                }

                else if($i == 30){
                    echo "<img src='images/black_king.svg' alt='black_king' class='image'>";
                }

                else if($i == 31){
                    echo "<img src='images/black_bishop.svg' alt='black_queen' class='image'>";
                }

                else if($i == 32){
                    echo "<img src='images/black_rook.svg' alt='black_queen' class='image'>";
                }

                echo "</h1>";

                if($i != 0 and $i % 4 == 0){
                    echo "</div>";       
                    $temp = $white;
                    $white = $black;
                    $black = $temp; 
                }       
            }            
            
echo    "</body>   
    </html>"; 
    
    


