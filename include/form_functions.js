

//Add student form   
//here I use this form for both creating and editing a student. So, when creating a student
//I don't pass the id and when editing I pass the id and thats how I diff it here. Id the studentId was passed 
//Then I assign the values to the hidden fields in the form
// --------------------------------------------------------------------------
function openAddStudentForm(studentId){

    if(studentId){
        const student = document.getElementById('hiddenStudent').value;
        const myStudent = JSON.parse(student);

        document.getElementById('fname').value = myStudent.FirstName;
        document.getElementById('lname').value = myStudent.LastName;
        document.getElementById('email').value = myStudent.Email;
        document.getElementById('phone').value = myStudent.Phone;
        document.getElementById('rating').value = myStudent.Rating;
        document.getElementById('lichess').value = myStudent.Lichess;     
                     
    } 
      
    document.getElementById('addStudentForm').style.display = 'block';
}


function closeAddStudentForm(){
    document.getElementById('addStudentForm').style.display = 'none';
}

//Add credits form   
// --------------------------------------------------------------------------
function openCreditForm(buttonclicked, credits){   
    document.getElementById('hiddenValue').value = buttonclicked;                             //I'm setting the id parameter to the type hidden (how is this called?) so I can now wich button was clicked
    
    if(buttonclicked == 'Subtract'){                                                 //What's happening here is that if subtract was clicked I want the max to be set to remaining credits amount
        document.getElementById('maxCredit').max = credits;                          //so the user cannot subtract more credits that the remaining ones. So if a user has 2 credits left a refund of more than
        document.getElementById('maxCredit').placeholder = '1 - ' + credits;         //2 credits cannot be done.This ensure that only students with remaining credits can get a refund
    }   
    
    document.getElementById('changeCreditsForm').style.display = 'block';             //I'm just using what I know if there a better way to do this please let me know :)
}
    
function closeCreditForm(){
    document.getElementById('changeCreditsForm').style.display = 'none';
}

//AddClass Form
// --------------------------------------------------------------------------

function openClassForm() {
    document.getElementById('addClassForm').style.display = 'block';
}

function closeClassForm() {
    document.getElementById('addClassForm').style.display = 'none';
}

//Delete student form
// --------------------------------------------------------------------------

function openDeleteStudent(studentId) {
   document.getElementById('hiddenStudentId').value = studentId;
   document.getElementById('addDeleteStudent').style.display = 'block';
}

function closeDeleteStudent() {
    document.getElementById('addDeleteStudent').style.display = 'none';
}  

//Delete class form
// --------------------------------------------------------------------------

function openDeleteClass(classId) {
    document.getElementById('hiddenClassId').value = classId;
    document.getElementById('addDeleteClass').style.display = 'block';
 }
 
 function closeDeleteClass() {
     document.getElementById('addDeleteClass').style.display = 'none';
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
 
// When the user clicks anywhere outside of the modal, close it
// --------------------------------------------------------------------------

let addStudentModal = document.getElementById('addStudentForm');
let deleteStudentModal = document.getElementById('addDeleteStudent');
let addClassModal = document.getElementById('addClassForm');
let addCreditsModal = document.getElementById('changeCreditsForm');
let deleteClassModal = document.getElementById('addDeleteClass');
let privateNotesModal = document.getElementById('privateNotesTextarea');
let publicNotesModal = document.getElementById('publicNotesTextarea');

window.onclick = function(event) {
    
    if (event.target == addStudentModal) {
        addStudentModal.style.display = 'none';
    }

    if (event.target == deleteStudentModal) {
        deleteStudentModal.style.display = 'none';
    }

    if (event.target == addClassModal) {
        addClassModal.style.display = 'none';
    }

    if (event.target == addCreditsModal) {
        addCreditsModal.style.display = 'none';
    }

    if (event.target == deleteClassModal) {
        deleteClassModal.style.display = 'none';
    }

    if (event.target != privateNotesModal) {
        document.getElementById('privNotesSaveButton').style.visibility = 'hidden';

    }

    if (event.target != publicNotesModal) {
        document.getElementById('publicNotesSaveButton').style.visibility = 'hidden';
    }
}

// --------------------------------------------------------------------------
















