    
//Add credits form   
// --------------------------------------------------------------------------
function openCreditForm(){
    document.getElementById('addCreditsForm').style.display = 'block';
}
    
function closeCreditForm(){
    document.getElementById('addCreditsForm').style.display = 'none';
}

//AddClass Form
// --------------------------------------------------------------------------

function openClassForm() {
    document.getElementById('addClassForm').style.display = 'block';

}

function closeClassForm() {
    document.getElementById('addClassForm').style.display = 'none';
}

//Delete form
// --------------------------------------------------------------------------

function openDeleteForm(id) {
   document.getElementById('hiddenStudentId').value = id;
   document.getElementById('addDeleteForm').style.display = 'block';
}

function closeDeleteForm() {
    document.getElementById('addDeleteForm').style.display = 'none';
}  

// When the user clicks anywhere outside of the modal, close it
// --------------------------------------------------------------------------

var addStudentModal = document.getElementById('addStudentForm');
var deleteStudentModal = document.getElementById('addDeleteForm');
var addClassModal = document.getElementById('addClassForm');
var addCreditsModal = document.getElementById('addCreditsForm');

window.onclick = function(event) {
    if (event.target == addStudentModal) {
        addStudentModal.style.display = 'none';
    }

    else if (event.target == deleteStudentModal) {
        deleteStudentModal.style.display = 'none';
    }

    else if (event.target == addClassModal) {
        addClassModal.style.display = 'none';
    }

    else if (event.target == addCreditsModal) {
        addCreditsModal.style.display = 'none';
    }
}

// --------------------------------------------------------------------------
















