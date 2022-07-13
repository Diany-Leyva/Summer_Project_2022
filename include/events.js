//Access then hidden array from php and parse them to use in js
const hiddenEvents = document.getElementById('hiddenEventsArray').value;
const events = JSON.parse(hiddenEvents);

layOutEvent(events);
