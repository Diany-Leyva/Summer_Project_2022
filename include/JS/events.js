// *********************************************************************************************************************************
//Ajax to get the events (classes)
// *********************************************************************************************************************************

fetch("/ajax/get_events.php?Events="+true)
.then(response => response.json())
.then(data => {layOutEvent(data)})     

// *********************************************************************************************************************************
//Display the currenttime in the dayView calendar. I need to check because I want the red line to move as the time changes
//so I will come back and works on this in the futute but I will keep this just for now 
// *********************************************************************************************************************************

fetch("/ajax/get_current_time.php?CurrentTime="+true)
.then(response => response.json())
.then(data => {layOutCurrentTimeLine(data)})

// *********************************************************************************************************************************
