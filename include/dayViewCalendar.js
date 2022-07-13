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
    // let end = event.end;
    // let start = event.start;
    let type = event.Type;
    let fName = event.FirstName;
    let lName = event.LastName;
    let time = event.StartTime;

    let units = width[id];
    if (!units) {units = 1};
    let left = (containerWidth / width[id]) * 10;
    if (!left || left < 0) {left = 10};
    createEvent(height, top, left, units, 
                type, fName, lName, time);
    });
}

let createEvent = (height, top, left, units, type, fName, lName, time) => {

    let node = document.createElement('DIV');
    node.className = 'event zoom';
    node.innerHTML = 
    "<span class='title'>"+type+" Class</span>\
    <br><span class='event-name'>"+fName+" "+lName+"</span>\
    <br><span class='event-time'>"+time+"</span>";

    // Customized CSS to position each event
    node.style.width = (containerWidth/units) + 'px';
    node.style.height = height + 'px';
    node.style.top = top + 'px';
    node.style.left = 10 + left + 'px';
  
    document.getElementById('events').appendChild(node);
  }