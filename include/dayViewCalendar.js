const containerHeight = 901;                                             
const containerWidth =  529;                                          
const minutesinDay = 60 * 15;                                           //15 hours in the schedule
let width = [];

  let layOutEvent = (events) => {

    // clear any existing nodes
    let myNode = document.getElementById('events');
    myNode.innerHTML = '';   
    
    events.forEach((event, id) => {
    let height = (event.end - event.start) / minutesinDay * containerHeight;
    let top = event.start / minutesinDay * containerHeight; 
    let units = width[id];
    if (!units) {units = 1};
    let left = (containerWidth / width[id]) * 10;
    if (!left || left < 0) {left = 10};
    createEvent(height, top, left, units, event);
    });
}

//I couln't figure out how to pass the whole event array to displayClassInfo(), or how to hide the whole 
//event object here, so I just hide each element in hiddenEventObjectInfo and then I split it in the function
let createEvent = (height, top, left, units, event) => {
    let node = document.createElement('DIV');
    node.id = 'newEvent';
    node.className = 'event zoom';
    node.innerHTML = 
    "<div onclick='displayClassInfo(\""+event.FirstName+"\", \""+event.LastName+"\", \""+event.StartTime+"\", \""+event.Email+"\", \""+event.LichessLink+"\", \""+event.ZoomLink+"\", \""+event.ClassId+"\")'><span class='title'>"+event.Type+" Class</span>\
    <br><span class='event-name'>"+event.FirstName+" "+event.LastName+"</span>\
    <br><span class='event-time'>"+event.StartTime+"</span></div>\
    ";

    // Customized CSS to position each event
    node.style.width = (containerWidth/units) + 'px';
    node.style.height = height + 'px';
    node.style.top = top + 'px';
    node.style.left = 10 + left + 'px';
  
    document.getElementById('events').appendChild(node);
  }