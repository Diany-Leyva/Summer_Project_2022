<?php
// ********************************************************************************************************************************
//To place the times I did what you recomended me. Each element position is
//absolute and en event has height: 50px. So I just loop and add 50 to the 
//counter as needed. I also add a timeframe for the half hours (tempTop) 
// ********************************************************************************************************************************

function echoDayViewCalendar(){
    $day = date('l').", ".date('M d');
    echo"
        <h2>Daily Schedule</h2>
        <div class='dayViewContainer'> 
     
            <h3><center> $day</h3>";
                $topPosition = 60;
                $currentTop = 60;            
                                                                                        
                for($i = 8; $i < 24; $i++){
                
                    if($i < 10){
                        $hour = "0".$i.":00";
                        $min = "0".$i.":30";
                    }

                    else{
                        $hour = $i.":00";
                        $min = $i.":30";
                    }    
                    
                    echo"
                        <div id='timeArea$i'>
                            <div id='$hour' value='$hour' ><time style='top:".$currentTop."px;'><hr>$hour</time></div><br></br>"; 
                            $tempTop = $currentTop + 30;
                        echo"<div id='$min' value='$min'><time style='top:".$tempTop."px;'><small style='color:#38393882'>$min</small></time></div> 
                        </div>";                      
                                                 
                                
                    $currentTop+=$topPosition;                  
                } 
                     
}

// ********************************************************************************************************************************

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
        $events[$i]['ClassId'] = $class['ClassId'];  
        $events[$i]['Type'] = $class['Type'];
        $events[$i]['StartDate'] = formatDate($class['StartDate'], 'Y-m-d');
        $events[$i]['StartTime'] = formatDate($class['StartDate'], 'H:i');
        $events[$i]['LichessLink'] = $class['LichessLink'];
        $events[$i]['ZoomLink'] = $class['ZoomLink']; 
        $events[$i]['StudentId'] = $class['StudentId'];  
        $events[$i]['FirstName'] = $class['FirstName'];
        $events[$i]['LastName'] = $class['LastName'];       
        $events[$i]['Email'] = $class['Email'];    
       
        $i++;     
    }
  
    //Hidding this array to then access it from js
    echo"  
        <div id='timeLine'></div> 
        <div id='events'></div>
        <input type='hidden' id='hiddenEventsArray' value=";echo json_encode($events);echo">";      
}  

// ********************************************************************************************************************************
//fucntion to add a line in the current time in the day calendar
//Here I just do a similar calculation to what I did to place the events 
// ********************************************************************************************************************************

function addCurrentTime(){
    $currentTime = date('H:i');   
    $timeArray = [];
    $hour = formatDate($currentTime, 'H');  
    $minutes = formatDate($currentTime, 'i');  

    if($hour > 7 &&                                            //because I just want to show it in the timeframe of my calendar 8:00-23:00
       $hour < 24){

        $top = (60 * ($hour - 7)) + $minutes; 
   
        $timeArray[0]['start'] =  $top;  
        $timeArray[0]['end'] =  $top + 0.5;
        $timeArray[0]['currentTime'] =  $currentTime; 
    }   
    
    echo" <input type='hidden' id='hiddenCurrentTime' value=";echo json_encode($timeArray);echo">
    </div>";
}

// ********************************************************************************************************************************
//So here I echo this function but if there is no classes I set up default values
//I do this because then I use JS to display the class info here when I click an event in the
//calendar and I'm doing so by using document.getElementbyId('...').value so I need this
//to have a previus value. Initialy I did if nextclass is not empty echo the stuff otherwise just
//echo "No pending classes", but that aproach does not work with my js changes 
// ********************************************************************************************************************************

function echoNextClassSection($classesToday){    
    
    $pendingClasses = calcFutureClasses($classesToday); 
    $nextClass = [];

    if(!empty($pendingClasses)){                                                              
        $nextClass = calcNextClass($pendingClasses);

        if($nextClass){
            $heading = 'Next Class';
            $id = $nextClass['ClassId'];
            $name = $nextClass['FirstName']." ".$nextClass['LastName'];
            $classDate = formatDate($nextClass['StartDate'], 'd M');
            $classTime = formatDate($nextClass['StartDate'], 'H:i A');
            $email = $nextClass['Email'];
            $lichess = $nextClass['LichessLink'];
            $zoom = $nextClass['ZoomLink'];
            $hour = '1 hour';     
            $class = 'enableAnchor';
            $deleteButtonVisibility = $editButtonVisibility = "style='visibility: visible';"; 
            
             //This time instead that hidding an array and using jason_encode to pass it to js I did it by passing an string and then I turn it into an array. Which way should be better?
            $date = formatDate($nextClass['StartDate'], 'Y-m-d');
            $time = formatDate($nextClass['StartDate'], 'H:i');  
        
            $classString = "ClassId:".$nextClass['ClassId'].",Type:".$nextClass['Type'].",ClassDate:$date,ClassTime:$time,ZoomLink:".$nextClass['ZoomLink'].",StudentId:".$nextClass['StudentId']; 
        }
    }  
    
    else{
        $heading = 'No pending <br>Classes';
        $id = $name = $classDate = $classTime = $email = $lichess = $zoom = $hour = '';
        $class = 'disableAnchor';
        $deleteButtonVisibility = $editButtonVisibility = "style='visibility: hidden';";
        $classString = '';
    }

    $showDeleteButton = "<button $deleteButtonVisibility id='deletButtonInfoClass' class='deleteButton onClassSession zoom' onclick=\"openDeleteClass($id)\">🗑</button>";
    $showEditButton = "<button $editButtonVisibility id='EditButtonInfoClass' class='EditButton onClassSession zoom' onclick=\"openIndexPageClassForm($id)\">✏️</button>";
         
    echo"        
        <div id='nextClassInfo' class='next-class-info'> 
            <div class='next-class-info-content'>     
                <p id='classInfoHeading' class='nextClassheader'>$heading</p>
                    <ol>
                        <li id='classInfoName'>$name</li>
                        <li id='classInfoDate'>$classDate</li>
                        <li id='classInfoTime'>$classTime</li>    
                        <li id='classInfoDuration'>$hour</li>                               
                    </ol>

                    <div class='nextclass-buttons-container'>
                        <div>
                            <a id='classInfoEmail' class='$class' href='mailto:$email'><img class ='zoom' src= '/images/envelope.png' alt='zoom'></a>                    
                            <p>Message</p>
                        </div>
                        <div>
                            <a id='classInfoLichess' class='$class' href='$lichess'><img class ='zoom' src= '/images/chess-pawn.png' alt='zoom'></a>                    
                            <p>Lichess</p>
                        </div>
                        <div>
                            <a id='classInfoZoom' class='$class' href='$zoom'><img class ='zoom' src= '/images/zoom-icon.png' alt='zoom'></a>
                            <p>Zoom</p>
                        </div>
                    </div>
                    <div class='nextClassPicturePosition'>
                        <span id='showDeleteButton'> $showDeleteButton </span>
                        <span id='showEditButton'> $showEditButton </span>
                        <img class= 'profilePicture' src= '/images/bishop.png' alt='bishop'>
                        <input type='hidden' id='hiddenClass-Edit-IndexPage' value='$classString'>             
                    </div>
                </div>      
            </div>";
            
}

// ********************************************************************************************************************************

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

// ********************************************************************************************************************************
