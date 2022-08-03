<?php
// ********************************************************************************************************************************
//To place the times I did what you recomended me. Each element position is
//absolute and en event has height: 50px. So I just loop and add 50 to the 
//counter as needed. I also add a timeframe for the half hours (tempTop) 
// ********************************************************************************************************************************

function echoDayViewCalendar(){
    $day = date('l').", ".date('M d');
    echo"
        <h2 id='target' class='dailyCalendarheader'>Daily Schedule</h2>
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

//********************************************************************************************************************************
//I know this function is so tiny. But I will just keep it 
//********************************************************************************************************************************

function addEvents(){
    echo"  
        <div id='timeLine'></div> 
        <div id='events'></div>
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
            $id = htmlspecialchars($nextClass['ClassId']);
            $name = htmlspecialchars($nextClass['FirstName'])." ".htmlspecialchars($nextClass['LastName']);
            $classDate = formatDate(htmlspecialchars($nextClass['StartDate']), 'd M H:i');           
            $email = htmlspecialchars($nextClass['Email']);
            $lichess = htmlspecialchars($nextClass['LichessLink']);
            $zoom = htmlspecialchars($nextClass['ZoomLink']);
            $hour = '1 hour';     
            $class = 'enableAnchor';
            $deleteButtonVisibility = $editButtonVisibility = "style='visibility: visible';";          
        }
    }  
    
    else{
        $heading = 'No pending <br>Classes';
        $id = $name = $classDate = $email = $lichess = $zoom = $hour = '';
        $class = 'disableAnchor';
        $deleteButtonVisibility = $editButtonVisibility = "style='visibility: hidden';";   
    }

    $showDeleteButton = "<button $deleteButtonVisibility id='deletButtonInfoClass' class='deleteButton onClassSession zoom' onclick=\"openDeleteClass($id)\">🗑</button>";
    $showEditButton = "<button $editButtonVisibility id='EditButtonInfoClass' class='editButton onClassSession zoom' onclick=\"openClassForm($id)\">✏️</button>";
         
    echo"   
        <h2 class='classesInfoHeader'>Classes Info</h2>  
        <div id='nextClassInfo' class='next-class-info'> 
            <div class='next-class-info-content'>     
                <p id='classInfoHeading' class='nextClassheader'>$heading</p>
                <ol>
                    <li id='classInfoName'>$name</li>
                    <li id='classInfoDate' value='$classDate'>$classDate</li>                    
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
                </div>
            </div>      
        </div>";            
}

// ********************************************************************************************************************************

function echoIndexTotalSection($totalClasses){
    echo"
        <div class='index-totalClassesSection'>
            <div class='item-total'>
                <p class='totalSectionHeader index'>Month</p>         
                <div class='square'>
                    <p class='totalNumber'>".htmlspecialchars($totalClasses['MonthTotal'])."</p>
                </div>
            </div>

            <div class='flex-item-total index'>
                <p class='totalSectionHeader year'>Year</p>  
                <div class='square'>
                    <p class='totalNumber year'>".htmlspecialchars($totalClasses['YearTotal'])."</p>
                </div>
            </div>
        </div>       
";
}

// ********************************************************************************************************************************
