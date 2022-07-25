

//Add student form   
//here I use this form for both creating and editing a student. So, when creating a student
//I don't pass the id and when editing I pass the id and thats how I diff it here. If the studentId was passed 
//Then I assign the values to the hidden fields in the formmake a AJAX request to load the info need it without having to
//reload the page and without using the hiding array weird thing I was doing
//----------------------------------------------------------------------
function openAddStudentForm(studentId){

    if(studentId){

        //AJAX request to get the student from the DB
        fetch("/include/AJAX_Requests.php?StudentId="+studentId)
        .then(response => response.json())
        .then(data => {document.getElementById('fname').value = data.FirstName,
            document.getElementById('lname').value = data.LastName,
            document.getElementById('email').value = data.Email,
            document.getElementById('phone').value = data.Phone,
            document.getElementById('rating').value = data.ELO,
            document.getElementById('lichess').value = data.LichessLink})                    
    } 
      
    document.getElementById('addStudentForm').style.display = 'block';
}


function closeAddStudentForm(){
    document.getElementById('addStudentForm').style.display = 'none';
}

//Add credits form   
// --------------------------------------------------------------------------
function openCreditForm(buttonclicked, credits){ 
    document.getElementById('hiddenButtonName').value = buttonclicked;                             //I'm setting the id parameter to the type hidden field so I can know wich button was clicked in the Request
    
    //AJAX request to get the student from the DB
    fetch("/include/AJAX_Requests.php?StudentId="+studentId)
    .then(response => response.json())
    .then(data => {document.getElementById('fname').value = data.FirstName,
        document.getElementById('lname').value = data.LastName,
        document.getElementById('email').value = data.Email,
        document.getElementById('phone').value = data.Phone,
        document.getElementById('rating').value = data.ELO,
        document.getElementById('lichess').value = data.LichessLink})   
        
    if(buttonclicked == 'Subtract'){                                                 //What's happening here is that if subtract was clicked I want the max to be set to remaining credits amount
        document.getElementById('maxCredit').max = credits;                          //so the user cannot subtract more credits that the remaining ones. So if a user has 2 credits left a refund of more than
        document.getElementById('maxCredit').placeholder = '1 - ' + credits;         //2 credits cannot be done.This ensure that only students with remaining credits can get a refund
    }  
    
    if(buttonclicked == 'Add'){                                                 //Trying out I see that id I click subtract first and then add the placeholder and max values
        document.getElementById('maxCredit').max = '100';                            //do not go back to normal and stay with the values I set above so I'm setting them here
        document.getElementById('maxCredit').placeholder = '1 - 100';
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
















