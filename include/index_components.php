<?php
// --------------------------------------------------------------------------
//To place the times I did what you recomended me. Each element position is
//absolute and en event has height: 50px. So I just loop and add 50 to the 
//counter as needed. I also add a timeframe for the half hours (tempTop) 
// --------------------------------------------------------------------------

function echoDayViewCalendar(){
    $day = date('l').", ".date('M d');
    echo"
        <h2>Daily Schedule</h2>
        <div class='dayViewContainer'> 
            <h3><center> $day</h3>";
                $topPosition = 50;
                $currentTop = 50;
            
                for($i = 8; $i < 24; $i++){
                    $meridiem = 'AM';

                    if($i > 12){
                        $meridiem = 'PM';
                    }

                    echo"
                        <div><time style='top:".$currentTop."px;'><hr>$i:00 $meridiem</time><div><br></br>"; 
                        $tempTop = $currentTop + 25;
                    echo"<div><time style='top:".$tempTop."px;'><small style='color:#38393882'>$i:30 $meridiem</small></time><div> 
                        ";       
                                
                    $currentTop+=$topPosition;
                } 

        echo"</div>";  
}

// --------------------------------------------------------------------------
//I'm sure this is not what you had in mind haha since you were talking about a function to pass
//starting date and ending date and I'm sure involves js. But this is what I came up with in php
//and so far is doing the job (I finally calculated the half hour too) 
//Strategy:
//The class "one-hour-class" has a height of 50px, so I loop throught the array of classesToday and
//I store the hour and min. Then I multiply the height(50) times the class hour (-7 because my schedule starts at 8)
//and this is the topPosition of the event. Also, since the minutes are only 00 or 30, I set halfhour to 25 only
//when min are 30 and add that to the final calculation to place the event in the 30 minutes session. 
// --------------------------------------------------------------------------
function echoEvents($classesToday){

    $id = 1;
    foreach($classesToday as $class){
        $time = formatDate($class['StartDate'], 'H:i A'); 
        $hour = formatDate($class['StartDate'], 'H');            
        $min = formatDate($class['StartDate'], 'i');  
        $halfhour = 0;

        if($min == 30){
            $halfhour = 25;
        }
      
        $topPosition = (50 * ($hour - 7)) + $halfhour;      
    
        echo"
        <p id='class-$id' class='one-hour-class zoom' style='top:".$topPosition."px;'>
            <p class='class-content' style='top:".$topPosition."px;'>Online Class<br>
            ".$class['FirstName']." ".$class['LastName']."<br>
            $time
            </p>
        </p>";   
       
        $id++;     
    }
}

// --------------------------------------------------------------------------

function echoNextClassSection($nextClass){    
    
    echo"
        <p class='nextClassheader'>Next Class</p>
        <div class='next-class-info'> 
            <div class='next-class-info-content'>";      

        if($nextClass){
            echo"
         
                <ol>
                    <li>".$nextClass['FirstName']." ".$nextClass['LastName']."</li>
                    <li>".formatDate($nextClass['StartDate'], 'd M')."</li>
                    <li>".formatDate($nextClass['StartDate'], 'H:i A')."</li>    
                    <li>1 hour</li>                               
                </ol>
        
                <div class='nextclass-buttons-container'>
                    <div>
                        <a href='mailto:".$nextClass['Email']."'><img class ='zoom' src= '/images/envelope.png' alt='zoom'></a>                    
                        <p>Message</p>
                    </div>
        
                    <div>
                        <a href='".$nextClass['LichessLink']."'><img class ='zoom' src= '/images/chess-pawn.png' alt='zoom'></a>                    
                        <p>Lichess</p>
                    </div>
        
                    <div>
                        <a href='".$nextClass['ZoomLink']."'><img class ='zoom' src= '/images/zoom-icon.png' alt='zoom'></a>
                        <p>Zoom</p>
                    </div>
                </div>
                <div class='nextClassPicturePosition'>
                    <img class= 'profilePicture' src= '/images/bishop.png' alt='bishop'>
                </div>        
                ";
        }

        else{
            echo"<p class='noclasses-message'>No classes pending</p>";
        }
        
        echo"</div>
    </div>";
}

// --------------------------------------------------------------------------

function echoIndexTotalSection($totalClasses){
    echo"
        <div class='index-totalClassesSection'>
            <div class='item-total'>
                <p class='totalSectionHeader'>Month</p>         
                <div class='profilePicture'>
                    <p id='totalNumberIndexPage'>".$totalClasses['MonthTotal']."</p>
                </div>
            </div>

            <div class='flex-item-total'>
                <p class='totalSectionHeader'>Year</p>  
                <div class='profilePicture'>
                    <p id='totalNumberIndexPage'>".$totalClasses['YearTotal']."</p>
                </div>
            </div>
        </div>
";
}

// --------------------------------------------------------------------------
