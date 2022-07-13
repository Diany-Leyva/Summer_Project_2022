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
                $topPosition = 60;
                $currentTop = 60;
            
                for($i = 8; $i < 24; $i++){
                    $meridiem = 'AM';

                    if($i > 11){
                        $meridiem = 'PM';
                    }

                    echo"
                        <div><time style='top:".$currentTop."px;'><hr>$i:00 $meridiem</time><div><br></br>"; 
                        $tempTop = $currentTop + 30;
                    echo"<div><time style='top:".$tempTop."px;'><small style='color:#38393882'>$i:30 $meridiem</small></time><div> 
                        ";       
                                
                    $currentTop+=$topPosition;
                } 
                echo"
                <div id='events'>";         
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
function addEvents($classesToday){  
    $events = [];                                                                         //Array to hold the start/end of every class today
     
    $i = 0;                                                                               
    foreach($classesToday as $class){
      
        $hour = formatDate($class['StartDate'], 'H');            
        $min = formatDate($class['StartDate'], 'i');  
        $halfhour = 0;

        if($min == 30){
            $halfhour = 30;
        }
      
        $topPosition = (60 * ($hour - 7)) + $halfhour;    
        
        //I'm storing all the information beacuse I use it to display the class Info in js later on
        //and this is the source 
        $events[$i]['start'] =  $topPosition;  
        $events[$i]['end'] =  $topPosition + 60;       
        $events[$i]['Type'] = $class['Type'];
        $events[$i]['FirstName'] = $class['FirstName'];
        $events[$i]['LastName'] = $class['LastName'];
        $events[$i]['StartTime'] = formatDate($class['StartDate'], 'H:iA');
        $events[$i]['Email'] = $class['Email'];
        $events[$i]['LichessLink'] = $class['LichessLink'];
        $events[$i]['ZoomLink'] = $class['ZoomLink'];        
        $i++;     
    }

    //Hidding this array to then access it from js
    echo"
    <input type='hidden' id='hiddenEventsArray' value=";echo json_encode($events);echo">
</div>";    
}  
// --------------------------------------------------------------------------

function echoNextClassSection($nextClass){    
    
    echo"        
        <div id='nextClassInfo' class='next-class-info'> 
            <div class='next-class-info-content'>";      

        if($nextClass){
            echo"
                <p id='classInfoHeading' class='nextClassheader'>Next Class</p>
                <ol>
                    <li id='classInfoName'>".$nextClass['FirstName']." ".$nextClass['LastName']."</li>
                    <li id='classInfoDate'>".formatDate($nextClass['StartDate'], 'd M')."</li>
                    <li id='classInfoTime'>".formatDate($nextClass['StartDate'], 'H:i A')."</li>    
                    <li>1 hour</li>                               
                </ol>
        
                <div class='nextclass-buttons-container'>
                    <div>
                        <a id='classInfoEmail' href='mailto:".$nextClass['Email']."'><img class ='zoom' src= '/images/envelope.png' alt='zoom'></a>                    
                        <p>Message</p>
                    </div>
        
                    <div>
                        <a id='classInfoLichess' href='".$nextClass['LichessLink']."'><img class ='zoom' src= '/images/chess-pawn.png' alt='zoom'></a>                    
                        <p>Lichess</p>
                    </div>
        
                    <div>
                        <a id='classInfoZoom' href='".$nextClass['ZoomLink']."'><img class ='zoom' src= '/images/zoom-icon.png' alt='zoom'></a>
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
