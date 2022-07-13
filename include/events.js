//Access then hidden array from php and parse them to use in js
const hiddenEvents = document.getElementById('hiddenEventsArray').value;
const events = JSON.parse(hiddenEvents);

// const hiddenClassesInfo = document.getElementById('hiddenClassesInfoArray').value;
// const classeInfo = JSON.parse(hiddenClassesInfo);

layOutEvent(events);
