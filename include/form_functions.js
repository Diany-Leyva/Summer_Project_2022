

//Add student form   
//here I use this form for both creating and editing a student. So, when creating a student
//I don't pass the id and when editing I pass the id and thats how I diff it here. Id the studentId was passed 
//Then I assign the values to the hidden fields in the form
// --------------------------------------------------------------------------
function openStudentForm(studentId){

    if(studentId){
        const hiddenStudent = document.getElementById('hiddenStudent-Edit').value;
        const myStudent = JSON.parse(hiddenStudent);

        document.getElementById('fname').value = myStudent.FirstName;
        document.getElementById('lname').value = myStudent.LastName;
        document.getElementById('email').value = myStudent.Email;
        document.getElementById('phone').value = myStudent.Phone;
        document.getElementById('rating').value = myStudent.Rating;
        document.getElementById('lichess').value = myStudent.Lichess;     
                     
    } 
      
    document.getElementById('studentForm').style.display = 'block';
}


function closeStudentForm(){
    document.getElementById('studentForm').style.display = 'none';
}

//Add credits form   
// --------------------------------------------------------------------------
function openCreditForm(buttonclicked, credits){ 
    document.getElementById('hiddenValue').value = buttonclicked;                             //I'm setting the id parameter to the type hidden field so I can know wich button was clicked in the Request
    
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
    
function closeCreditForm(){ 
    document.getElementById('creditsForm').style.display = 'none';
}

//AddClass Form
//Here I use the form for creating a new class and for editing a new class 
//when is for creating I pass an empty string, whn editing I pass the classId and then 
//I set the hidden values in the form to the corrsponding values in the array 
//that is hidden. I didn't know how to pass and array as parameter from php
//to js and the only thing that worked was hidding the array using json_encode
//and then accessing it from here 
// --------------------------------------------------------------------------

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
        document.getElementById('clock').value = document.getElementById('8:00').value
        document.getElementById('zoomLink').value = '';
        document.getElementById('hiddenClassId-Edit').value = '';
        document.getElementById('submitButton').name = 'AddClassesSubmitted';   
    }

    document.getElementById('classForm').style.display = 'block';
}

function closeClassForm() {
    document.getElementById('classForm').style.display = 'none';
}

// 
// --------------------------------------------------------------------------

function openIndexPageClassForm(classId){  

    let today = document.getElementById('ClassDateIndexPage').value;

    if(classId){
        const hiddenClass = document.getElementById('hiddenClass-Edit').value;    
        const myClass = JSON.parse(hiddenClass);
      
        document.getElementById('dropdownIndexPage').value = myClass.Type;
        document.getElementById('ClassDateIndexPage').value = myClass.ClassDate;
        document.getElementById('clockIndexPage').value = myClass.ClassTime;
        document.getElementById('zoomLinkIndexPage').value = myClass.ZoomLink;
        document.getElementById('hiddenClassId-Edit-IndexPage').value = myClass.ClassId;
        document.getElementById('submitButtonIndexPage').name = 'EditClassesSubmitted';   
    }

    //Since these add/edit are used in the same page, I need to reset the values because
    //when I use edit and I want to add a class right after, the add form shows up with
    //the values set above, so we need to re-set this
    else{     

        document.getElementById('dropdownIndexPage').value = 'Online';    
        document.getElementById('ClassDateIndexPage').value = today;
        document.getElementById('zoomLinkIndexPage').value = '';
        document.getElementById('hiddenClassId-Edit-IndexPage').value = '';
        document.getElementById('submitButtonIndexPage').name = 'AddClassesSubmitted';  

        //get the studentId and the remaining credits that were hidden in the options
        let studentId = document.getElementById('studentListIndexPage').value;
        let remainingCredits = document.getElementById("credits"+studentId).value;

        if(remainingCredits > 0){
            document.getElementById('StdCreditAmount').value = remainingCredits;
            document.getElementById('StdCreditAmount').placeholder = remainingCredits; 
            document.getElementById('messageCredits').style.visibility = 'hidden';     

          }
        
          else{
            document.getElementById('StdCreditAmount').value = 0;
            document.getElementById('StdCreditAmount').placeholder = 0;
            document.getElementById('messageCredits').style.visibility = 'visible';       

        }

        }

        document.getElementById('classFormIndexPage').style.display = 'block';
}

//Change credits amount if the selection was changed
document.addEventListener('input', function (event) {

	// Only run for #studentListIndexPage select
    if (event.target.id === 'studentListIndexPage'){

  //update the remaing credits
  let studentId = document.getElementById('studentListIndexPage').value;
  let remainingCredits = document.getElementById("credits"+studentId).value;
  
  if(remainingCredits > 0){
    document.getElementById('StdCreditAmount').value = remainingCredits;
    document.getElementById('StdCreditAmount').placeholder = remainingCredits; 
    document.getElementById('messageCredits').style.visibility = 'hidden';     

  }

  else{
    document.getElementById('StdCreditAmount').value = 0;
    document.getElementById('StdCreditAmount').placeholder = 0;
    document.getElementById('messageCredits').style.visibility = 'visible';   

}
  
  //Update the element with the remaining credits
  console.log(document.getElementById('StdCreditAmount').required);
}

});

function closeIndexPageClassForm() {          
      
    document.getElementById('classFormIndexPage').style.display = 'none';

    //I'm reloading the page because I changed a lot of option within the class form (the time to show in the clock
    //for instance) so if I reload the page I get all the values back to when the form was created 
    location.reload();  
    exit();                                                     
}

//Delete student form
// --------------------------------------------------------------------------

function openDeleteStudent(studentId) {
   document.getElementById('hiddenStudentId').value = studentId;
   document.getElementById('deleteStudent').style.display = 'block';
}

function closeDeleteStudent() {
    document.getElementById('deleteStudent').style.display = 'none';
}  

//Delete class form
// --------------------------------------------------------------------------

function openDeleteClass(classId) {
    document.getElementById('hiddenClassId-Delete').value = classId;
    document.getElementById('deleteClass').style.display = 'block';
 }
 
 function closeDeleteClass() {
     document.getElementById('deleteClass').style.display = 'none';
 }  

 //Save notes
// --------------------------------------------------------------------------
function showSaveButton(heading){   
    document.getElementById(heading).style.visibility = 'visible';
}

//Search Bar
// --------------------------------------------------------------------------

function searchStudent() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();   
    table = document.getElementById('tableContainer');   
    tr = table.getElementsByTagName('tr');
   
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0];
      console.log(td);
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = '';
        } else {
          tr[i].style.display = 'none';
        }
      }       
    }
  }

// This functions allows us to click an event in the calendar and it will display the
//class info in the clss info session. I couln't figure out how to pass the whole object
//by just passing the object name, so I just passed a each element separated by a comma
// --------------------------------------------------------------------------
function displayClassInfo(fName, lName, StartTime, Email, Lichess, Zoom, id){   

document.getElementById('deletButtonInfoClass').style.visibility = 'visible';
document.getElementById('showDeleteButton').innerHTML = "<button id='deletButtonInfoClass' class='deleteButton onClassSession zoom' onclick=\"openDeleteClass("+id+")\">🗑</button>";
document.getElementById('classInfoHeading').innerHTML = 'Class Info';
document.getElementById('classInfoName').innerHTML = fName+" "+lName;
document.getElementById('classInfoTime').innerHTML = StartTime;
document.getElementById('classInfoDuration').innerHTML = '1 hour';
document.getElementById('classInfoEmail').className = 'enableAnchor';
document.getElementById('classInfoEmail').href = Email;
document.getElementById('classInfoLichess').className = 'enableAnchor';
document.getElementById('classInfoLichess').href = Lichess;
document.getElementById('classInfoZoom').className = 'enableAnchor';
document.getElementById('classInfoZoom').href = Zoom;
document.getElementById('nextClassInfo').className = 'next-class-info nextClassInfoChanged';

}
 
// When the user clicks anywhere outside of the modal, close it
// --------------------------------------------------------------------------

let studentFormModal = document.getElementById('studentForm');
let deleteStudentModal = document.getElementById('deleteStudent');
let classFormModal = document.getElementById('classForm');
let creditsFormModal = document.getElementById('creditsForm');
let deleteClassModal = document.getElementById('deleteClass');
let privateNotesModal = document.getElementById('privateNotesTextarea');
let publicNotesModal = document.getElementById('publicNotesTextarea');

window.onclick = function(event) {

    // if (event.target != privateNotesModal) {
    //     document.getElementById('privNotesSaveButton').style.visibility = 'hidden';
    // }

    // if (event.target != publicNotesModal) {
    //     document.getElementById('publicNotesSaveButton').style.visibility = 'hidden';
    // }  
   
    // if (event.target == studentFormModal) {
    //     studentFormModal.style.display = 'none';
    // }

    // if (event.target == deleteStudentModal) {
    //     deleteStudentModal.style.display = 'none';
    // }

    // if (event.target == classFormModal) {
    //     classFormModal.style.display = 'none';
    // }

    // if (event.target == creditsFormModal) {
    //     creditsFormModal.style.display = 'none';
    // }

    // if (event.target == deleteClassModal) {
    //     deleteClassModal.style.display = 'none';
    // }
 
}

// --------------------------------------------------------------------------
















