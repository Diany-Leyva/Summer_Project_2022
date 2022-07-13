const containerHeight = 901;                                             
const containerWidth =  504;                                          
const minutesinDay = 60 * 15;                                           //15 hours in the schedule
let width = [];
let leftOffSet = [];

let createEvent = (height, top, left, units) => {

    let node = document.createElement('DIV');
    node.className = 'event';
    node.innerHTML = 
    "<span class='title'> Sample Item </span> \
    <br><span class='location'> Sample Location </span>";
  
    // Customized CSS to position each event
    node.style.width = (containerWidth/units) + 'px';
    node.style.height = height + 'px';
    node.style.top = top + 'px';
    node.style.left = 10 + left + 'px';
  
    document.getElementById('events').appendChild(node);
  }


  let layOutDay = (events) => {

    // clear any existing nodes
    let myNode = document.getElementById('events');
    myNode.innerHTML = '';
    
      // getCollisions(events);
      // getAttributes(events);
    
      events.forEach((event, id) => {
        let height = (event.end - event.start) / minutesinDay * containerHeight;
        let top = event.start / minutesinDay * containerHeight; 
        let end = event.end;
        let start = event.start;
        let units = width[id];
        if (!units) {units = 1};
        let left = (containerWidth / width[id]) * (leftOffSet[id] - 1) + 10;
        if (!left || left < 0) {left = 10};
        createEvent(height, top, left, units);
      });
    }