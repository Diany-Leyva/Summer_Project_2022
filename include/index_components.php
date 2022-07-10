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
//starting date and ending date and I'm sure involves js. But this is what I came up with. 
//I will talk to you about it in the jog meeting 
// --------------------------------------------------------------------------
function echoEvents($classesToday){ 
    foreach($classesToday as $class){
        $hour = formatDate($class['StartDate'], 'H');            
        $time = formatDate($class['StartDate'], 'H:i A');                    
        $topPosition = 50 * ($hour - 7);
    
        echo"
        <p class='one-hour-class' style='top:".$topPosition."px;'>".$class['FirstName']." ".$class['LastName']."<p>";           
                
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
