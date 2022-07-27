
// *********************************************************************************************************************************
//Add student form   
//here I use this form for both creating and editing a student. So, when creating a student
//I don't pass the id and when editing I pass the id and thats how I diff it here. If the studentId was passed 
//Then I assign the values to the hidden fields in the formmake a AJAX request to load the info need it without having to
//reload the page and without using the hiding array weird thing I was doing
// *********************************************************************************************************************************

function openStudentForm(studentId){

    if(studentId){

        //AJAX request to get the student from the DB
        fetch("/include/AJAX_Requests.php?StudentIdToEdit="+studentId)
        .then(response => response.json())
        .then(data => {document.getElementById('fname').value = data.FirstName,
            document.getElementById('lname').value = data.LastName,
            document.getElementById('email').value = data.Email,
            document.getElementById('phone').value = data.Phone,
            document.getElementById('rating').value = data.ELO,
            document.getElementById('lichess').value = data.LichessLink})                    
    } 
        //I dont want to show the whole link, only username so I'm getting a substring, position 22 because
        //each link starts as https://lichess.org/@/ followed by the username and we only want the username now
        // let lichessLink = myStudent.Lichess;
        // let lichessUsername = lichessLink.substr(22);      
        // document.getElementById('lichess').value = lichessUsername;                    
   
      
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
    
    if(buttonclicked == 'Subtract'){                                                 //What's happening here is that if subtract was clicked I want the max to be set to remaining credits amount
        document.getElementById('maxCredit').max = credits;                          //so the user cannot subtract more credits that the remaining ones. So if a user has 2 credits left a refund of more than
        document.getElementById('maxCredit').placeholder = '1 - ' + credits;         //2 credits cannot be done.This ensure that only students with remaining credits can get a refund
    }  
    
    if(buttonclicked == 'Add'){                                                 //Trying out I see that id I click subtract first and then add the placeholder and max values
        document.getElementById('maxCredit').max = '100';                            //do not go back to normal and stay with the values I set above so I'm setting them here
        document.getElementById('maxCredit').placeholder = '1 - 100';
    }
    
    document.getElementById('creditsForm').style.display = 'block';             //I'm just using what I know if there a better way to do this please let me know :)
}
    
// *********************************************************************************************************************************

function closeCreditForm(){ 
    document.getElementById('creditsForm').style.display = 'none';
}

// *********************************************************************************************************************************
//AddClass Form
//Here I use the form for creating a new class and for editing a new class 
//when is for creating I pass an empty string, whn editing I pass the classId and then 
//I set the hidden values in the form to the corrsponding values in the array 
//that is hidden. I didn't know how to pass and array as parameter from php
//to js and the only thing that worked was hidding the array using json_encode
//and then accessing it from here 
// *********************************************************************************************************************************

function openClassForm(classId) { 
  
    let today = document.getElementById('ClassDate').value;

    if(classId){
        const hiddenClass = document.getElementById('hiddenClass-Edit').value;    
        const myClass = JSON.parse(hiddenClass);
      
        document.getElementById('dropdown').value = myClass.Type;
        document.getElementById('ClassDate').value = myClass.ClassDate;
        document.getElementById('clock').value = myClass.ClassTime;
        document.getElementById('zoomLink').value = myClass.ZoomLink;
        document.getElementById('hiddenClassId-Edit').value = myClass.ClassId;
        document.getElementById('submitButton').name = 'EditClassesSubmitted';       
    }

    //Since these add/edit are used in the same page, I need to reset the values because
    //when I use edit and I want to add a class right after, the add form shows up with
    //the values set above, so we need to re-set this
    else{      

        document.getElementById('dropdown').value = 'Online';    
        document.getElementById('ClassDate').value = today;       
        document.getElementById('zoomLink').value = '';
        document.getElementById('hiddenClassId-Edit').value = '';
        document.getElementById('submitButton').name = 'AddClassesSubmitted';   
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
 
