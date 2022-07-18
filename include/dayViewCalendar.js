 //When the user clicks an available spot in the calendar book a class
 //the array holds each hour and then the loop creates the eventlistener             
 const timeArea = [document.getElementById('timeArea8'), 
 document.getElementById('timeArea9'),
 document.getElementById('timeArea10'),
 document.getElementById('timeArea11'),
 document.getElementById('timeArea12'),
 document.getElementById('timeArea13'),
 document.getElementById('timeArea14'),
 document.getElementById('timeArea15'),
 document.getElementById('timeArea16'),
 document.getElementById('timeArea17'),
 document.getElementById('timeArea18'),
 document.getElementById('timeArea19'),
 document.getElementById('timeArea20'),
 document.getElementById('timeArea21'),
 document.getElementById('timeArea22'),
 document.getElementById('timeArea23')];


//So here in the array each element has multiple children and I'm interested in the id of the first and 3rd because
//it is the time slot that was clicked. If I pass them to the openIndexPageClassForm function I get to show the time I want
//For instance: the user clicked a available time slot in the calendar, and it is 8:00 and 8:30, I only want to show those times
//when the book class forms opens up instead of showing all the times 
for (let i = 0; i < timeArea.length; i++) {
  timeArea[i].addEventListener('click', function handleClick() {

  let children = timeArea[i].children;        
  let hourId = children[0].id;
  let halfHourId = children[3].id;

//To do the hour is a bit different because I just want to show the hours of the time
//slot clicked so that's why I'm looping throught the options and if they don't match
//the clicked times slot I set them to null 
  let clock = document.getElementById('clockIndexPage');
  let items = clock.options;
     
        // let size = items.length;
        for (let i = 0; i < items.length; i++) {
            if (items[i].innerHTML != hourId){
                if(items[i].innerHTML != halfHourId){              
                    clock.options[i] = null;
                    i--;                                            //Need to decrease the counter because on option was remove            
                }                
            }
        }     

    openIndexPageClassForm('');
});
}

//To display events 
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
    "<div onclick='displayClassInfo(\""+event.ClassId+"\",\""+event.Type+"\",\""+event.StartDate+"\",\""+event.StartTime+"\",\""+event.LichessLink+"\",\""+event.ZoomLink+"\",\""+event.StudentId+"\",\""+event.FirstName+"\",\""+event.LastName+"\",\""+event.Email+"\")'><span class='title'>"+event.Type+" Class</span>\
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




