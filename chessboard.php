  

<?php 

echo "<html>";                                                                                                      
echo "<head>";
echo "<title>My Chess Board</title>";                                                          
echo "<link href='ChessBoard.css' rel='stylesheet'>";
echo "</head>";

echo "<body>";  
                                                                                             

     
      $white = "white";
      $black = "black";

     for($i = 1; $i < 8 + 1; $i++)
     {
        echo "<div class='board'>";
        echo "<h1 class='Square' style='background-color: $white;'></h1>";
        echo "<h1 class='Square' style='background-color: $black;'></h1>"; 
        echo "<h1 class='Square' style='background-color: $white;'></h1>";
        echo "<h1 class='Square' style='background-color: $black;'></h1>"; 
        echo "<h1 class='Square' style='background-color: $white;'></h1>";
        echo "<h1 class='Square' style='background-color: $black;'></h1>"; 
        echo "<h1 class='Square' style='background-color: $white;'></h1>";
        echo "<h1 class='Square' style='background-color: $black;'></h1>"; 
        echo "</div>";
       
        $temp = $white;
        $white = $black;
        $black = $temp;
            
    }  

  

    echo "</body>" ;  
    echo "</html>"; 
    




