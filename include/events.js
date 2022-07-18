//Access then hidden array from php and parse them to use in js
const hiddenEvents = document.getElementById('hiddenEventsArray').value;
const events = JSON.parse(hiddenEvents);

layOutEvent(events);


//Access then hidden current time from php and parse them to use in js
let currentTime = document.getElementById('hiddenCurrentTime').value;
layOutCurrentTimeLine(currentTime);