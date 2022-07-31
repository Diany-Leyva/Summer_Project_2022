// ********************************************************************************************************************************
// I hide the next class when displaying the next class info so I can access it
//from here and I use it to display the values in the class form to edit a class
// ********************************************************************************************************************************

function openIndexPageClassForm(){  

    let today = getToday();
    
    document.getElementById('ClassDateIndexPage').value = today;
    document.getElementById('zoomLinkIndexPage').value = '';
    document.getElementById('hiddenClassId-Edit-IndexPage').value = '';
    document.getElementById('submitButtonIndexPage').name = 'AddClassesSubmitted';  

    //get the studentId and the remaining credits that were hidden in the options
    let studentId = document.getElementById('studentListIndexPage').value;
    let remainingCredits = document.getElementById("credits"+studentId).value;

    //This is to show the remaing credits of each student because if it is zero the 
    //user will need to add a credit before booking the class
    if(remainingCredits > 0){
        document.getElementById('StdCreditAmount').value = remainingCredits;
        document.getElementById('StdCreditAmount').placeholder = remainingCredits; 
        document.getElementById('toggle').required = false;
    }
            
    else{
        document.getElementById('StdCreditAmount').value = 0;
        document.getElementById('StdCreditAmount').placeholder = 0;
        document.getElementById('toggle').required = true;
    }
      
    document.getElementById('classFormIndexPage').style.display = 'block'; 
}

// ********************************************************************************************************************************
// This functions allows us to click an event in the calendar and it will display the
//class info in the clss info session. I couln't figure out how to pass the whole object
//by just passing the object name, so I just passed a each element separated by a comma.
//Also I need to also hide the whole class here to be able to edit it when clicking the 
//edit button. Previusly what I have hidden there is the class, or not class at all if
//there is not pedning class so I need to update that value here
// ********************************************************************************************************************************

function displayClassInfo(classId, Type, StartDate, StartTime, Lichess, Zoom, studentId, fName, lName, Email){ 

    let date = new Date(StartDate);
    let day = date.getDate();
    let month = getMonthShortName(date.getMonth());
   
    document.getElementById('deletButtonInfoClass').style.visibility = 'visible';
    document.getElementById('showDeleteButton').innerHTML = "<button id='deletButtonInfoClass' class='deleteButton onClassSession zoom' onclick=\"openDeleteClass("+classId+")\">🗑</button>";
    document.getElementById('showEditButton').innerHTML = "<button id='EditButtonInfoClass' class='editButton onClassSession zoom' onclick=\"openClassForm("+classId+")\">✏️</button>";
    document.getElementById('classInfoHeading').innerHTML = 'Class Info';
    document.getElementById('classInfoName').innerHTML = fName+" "+lName;
    document.getElementById('classInfoDate').innerHTML = day+" "+month+" "+StartTime;
    document.getElementById('classInfoDuration').innerHTML = '1 hour';
    document.getElementById('classInfoEmail').className = 'enableAnchor';
    document.getElementById('classInfoEmail').href = Email;
    document.getElementById('classInfoLichess').className = 'enableAnchor';
    document.getElementById('classInfoLichess').href = Lichess;
    document.getElementById('classInfoZoom').className = 'enableAnchor';
    document.getElementById('classInfoZoom').href = Zoom;
    document.getElementById('nextClassInfo').className = 'next-class-info nextClassInfoChanged';
    document.getElementById('horizontalMenu').scrollIntoView({behavior: 'smooth'});                        //to jump to that id in screen
}

    // ********************************************************************************************************************************
//Event listener for input
// *********************************************************************************************************************************

document.addEventListener('input', function (event) {

	// Only run for #studentListIndexPage select (this is the name selection in the class form on home page)
    if (event.target.id === 'studentListIndexPage'){

        //uncheck the toggle, in case was checked previusly
        document.getElementById('toggle').checked = false;
        document.getElementById('ZoomLinktoggleHomePage').checked = false;
        document.getElementById('zoomLinkIndexPage').value = '';
        document.getElementById('zoomLinkIndexPage').placeholder = '';

        //update the remaing credits
        let studentId = document.getElementById('studentListIndexPage').value;
        let remainingCredits = document.getElementById("credits"+studentId).value;
    
        if(remainingCredits > 0){
            document.getElementById('StdCreditAmount').value = remainingCredits;
            document.getElementById('StdCreditAmount').placeholder = remainingCredits; 
            document.getElementById('toggle').required = false;
        }

        else{
            document.getElementById('StdCreditAmount').value = 0;
            document.getElementById('StdCreditAmount').placeholder = 0;
            document.getElementById('toggle').required = true;
        }
    }

	// Only run for #toggle changed
    if (event.target.id === 'toggle'){
        
        if(document.getElementById('toggle').checked == true){
            let amount = document.getElementById('StdCreditAmount').value;
            document.getElementById('StdCreditAmount').value = ++amount;
            document.getElementById('StdCreditAmount').placeholder = document.getElementById('StdCreditAmount').value; 
            document.getElementById('creditLabel').style.color = '#2691d9';       
                        
        }

        else{
            let amount = document.getElementById('StdCreditAmount').value;
            document.getElementById('StdCreditAmount').value = --amount;
            document.getElementById('StdCreditAmount').placeholder = document.getElementById('StdCreditAmount').value; 
            document.getElementById('creditLabel').style.color = '#606264';      

        }      
    }

    // Only run for #ZoomLinktoggleHomePage changed
    if (event.target.id === 'ZoomLinktoggleHomePage'){
        
        if(document.getElementById('ZoomLinktoggleHomePage').checked == true){
            let defaultLink = document.getElementById('hiddendefaultZoomLinkHomePage').value;
            document.getElementById('zoomLinkIndexPage').value = defaultLink;
            document.getElementById('zoomLinkIndexPage').placeholder = document.getElementById('zoomLinkIndexPage').value;
            document.getElementById('toggleheadingClassIndexPage').style.color = '#2691d9';         

        }

        else{           
            document.getElementById('zoomLinkIndexPage').value = '';
            document.getElementById('zoomLinkIndexPage').placeholder = document.getElementById('zoomLinkIndexPage').value;  
            document.getElementById('toggleheadingClassIndexPage').style.color = '#606264';         

        }      
    }  
    
    // Only run for #toggle changed
    if (event.target.id === 'ZoomLinktoggle'){
        
        if(document.getElementById('ZoomLinktoggle').checked == true){
            let defaultLink = document.getElementById('hiddendefaultZoomLink').value;
            document.getElementById('zoomLink').value = defaultLink;
            document.getElementById('zoomLink').placeholder = document.getElementById('zoomLink').value; 
            document.getElementById('toggleLinkHeading').style.color = '#2691d9';         
        }
    
        else{           
            document.getElementById('zoomLink').value = '';
            document.getElementById('zoomLink').placeholder = document.getElementById('zoomLink').value; 
            document.getElementById('toggleLinkHeading').style.color = '#606264';         
        }      
    }
});

// ********************************************************************************************************************************
//When the user submit the classFormIndexPage form 
//*********************************************************************************************************************************

document.getElementById('classFormIndexPage').addEventListener('submit', function (event) {
    //This look like a good place to check for the classes availability but I will wait for our next jog (maybe you
    //are reading this and we already talked about it lol, to see what you recomend to handle classes conflict)
    
    
}), false;

// *********************************************************************************************************************************

function closeIndexPageClassForm() {          
      
    document.getElementById('classFormIndexPage').style.display = 'none';

    //I'm reloading the page because I changed a lot of option within the class form (the time to show in the clock
    //for instance) so if I reload the page I get all the values back to when the form was created 
    location.reload();
}

// ******************************************************************************************************************************** 
// When the user clicks anywhere outside of the modal, close it
// ********************************************************************************************************************************

let classFormModal = document.getElementById('classForm');
let classFormIndexPage = document.getElementById('classFormIndexPage');
let deleteClassModal = document.getElementById('deleteClass');

window.onclick = function(event) { 

    if (event.target == classFormModal) {
        classFormModal.style.display = 'none';
    }
    
    if (event.target == classFormIndexPage) {
        classFormIndexPage.style.display = 'none';
        //I'm reloading the page because I changed a lot of option within the class form (the time to show in the clock
        //for instance) so if I reload the page I get all the values back to when the form was created
        //I might handle this differently in the future of course. Instead of reloading the page, I might
        //do AJAX request to call a function in the endpoint that returns the defauklt clock options
        //and then I asign the option in the front end instead of reloading the page, or I can also just display all the 
        //clok option instead of just the one where the user clocked. Will work on this later 
        location.reload();  
    }

    if (event.target == deleteClassModal) {
        deleteClassModal.style.display = 'none';
    } 
}

// ********************************************************************************************************************************