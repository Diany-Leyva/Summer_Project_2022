
// *********************************************************************************************************************************
//Add student form 
// *********************************************************************************************************************************

function openStudentForm(studentId){

    if(studentId){
        //AJAX request to get the student from the DB
        fetch("/ajax/get_student.php?StudentIdToEdit="+studentId)
        .then(response => response.json())
        .then(data => {document.getElementById('fname').value = data.FirstName,
            document.getElementById('lname').value = data.LastName,
            document.getElementById('email').value = data.Email,
            document.getElementById('phone').value = data.Phone,
            document.getElementById('rating').value = data.ELO,         
            document.getElementById('lichess').value = data.LichessLink.substr(22),
            document.getElementById('submitStudentButton').name = 'EditStudentSubmitted'
        })                    
    }                     
      
    document.getElementById('studentForm').style.display = 'block';
}

// *********************************************************************************************************************************

function closeStudentForm(){
    document.getElementById('studentForm').style.display = 'none';
}

// *********************************************************************************************************************************
//Add credits form   
// *********************************************************************************************************************************

function openCreditForm(buttonclicked, credits){ 
    document.getElementById('hiddenButtonName').value = buttonclicked;                             //I'm setting the id parameter to the type hidden field so I can know wich button was clicked in the Request
    
    if(buttonclicked == 'Subtract'){                                                              //What's happening here is that if subtract was clicked I want the max to be set to remaining credits amount
        document.getElementById('maxCredit').max = credits;                                       //so the user cannot subtract more credits that the remaining ones. So if a user has 2 credits left a refund of more than
        document.getElementById('maxCredit').placeholder = '1 - ' + credits;                       //2 credits cannot be done.This ensure that only students with remaining credits can get a refund
    }  
    
    if(buttonclicked == 'Add'){                                                                     //Trying out I see that id I click subtract first and then add the placeholder and max values
        document.getElementById('maxCredit').max = '100';                                           //do not go back to normal and stay with the values I set above so I'm setting them here
        document.getElementById('maxCredit').placeholder = '1 - 100';
    }

    document.getElementById('creditsForm').style.display = 'block';                                 //I'm just using what I know if there a better way to do this please let me know :)
}
    
// *********************************************************************************************************************************

function closeCreditForm(){ 
    document.getElementById('creditsForm').style.display = 'none';
}

// *********************************************************************************************************************************
//AddClass Form
// *********************************************************************************************************************************

function openClassForm(classId) { 
  
    let date, day, month, year, hours, min, today, startDate, startTime;

    if(classId){              

        //AJAX request to get the class from the DB
        fetch("/ajax/get_class.php?ClassIdToEdit="+classId)
        .then(response => response.json())
        .then(data => {document.getElementById('dropdown').value = data.Type,
        date = new Date(data.StartDate),
        day = date.getDate().toString().padStart(2, "0"),
        month = (date.getMonth() + 1).toString().padStart(2, "0"),
        year = date.getFullYear(),
        hours = date.getHours().toString().padStart(2, "0"),
        min = date.getMinutes().toString().padStart(2, "0"),
        startDate = year+"-"+month+"-"+day,
        startTime = hours+":"+min,
        document.getElementById('ClassDate').value = startDate,
        document.getElementById('ClassDate').min = '',
        document.getElementById('clock').value = startTime,
        document.getElementById('zoomLink').value = data.ZoomLink,
        document.getElementById('hiddenClassId-EditForm').value = classId,
        document.getElementById('submitButtonClass').name = 'EditClassesSubmitted'})                    
    } 

    else{   
               
        today = getToday();

        document.getElementById('dropdown').value = '';    
        document.getElementById('ClassDate').value = ''; 
        document.getElementById('ClassDate').min = today;
        document.getElementById('clock').value = '';    
        document.getElementById('zoomLink').value = '';        
        document.getElementById('hiddenClassId-EditForm').value = '';     
        document.getElementById('submitButtonClass').name = 'AddClassesSubmitted';   
    }

    document.getElementById('classForm').style.display = 'block';
}

// *********************************************************************************************************************************

function closeClassForm() {
    document.getElementById('classForm').style.display = 'none';
}

// *********************************************************************************************************************************
//Delete student form
// *********************************************************************************************************************************

function openDeleteStudent(studentId) {
   document.getElementById('hiddenStudentId').value = studentId;
   document.getElementById('deleteStudent').style.display = 'block';
}

// *********************************************************************************************************************************

function closeDeleteStudent() {
    document.getElementById('deleteStudent').style.display = 'none';
}  

// *********************************************************************************************************************************
//Delete class form
// *********************************************************************************************************************************

function openDeleteClass(classId) {
    document.getElementById('hiddenClassId-Delete').value = classId;
    document.getElementById('deleteClass').style.display = 'block';
 }
 
// *********************************************************************************************************************************

 function closeDeleteClass() {
     document.getElementById('deleteClass').style.display = 'none';
 }  

// *********************************************************************************************************************************
 
