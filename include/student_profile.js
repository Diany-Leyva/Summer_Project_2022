
//Save notes
// --------------------------------------------------------------------------
function showSaveButton(heading){   
    document.getElementById(heading).style.visibility = 'visible';
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

    if (event.target != privateNotesModal) {
        document.getElementById('privNotesSaveButton').style.visibility = 'hidden';
    }

    if (event.target != publicNotesModal) {
        document.getElementById('publicNotesSaveButton').style.visibility = 'hidden';
    }  
   
    if (event.target == studentFormModal) {
        studentFormModal.style.display = 'none';
    }

    if (event.target == deleteStudentModal) {
        deleteStudentModal.style.display = 'none';
    }

    if (event.target == classFormModal) {
        classFormModal.style.display = 'none';
    }

    if (event.target == creditsFormModal) {
        creditsFormModal.style.display = 'none';
    }

    if (event.target == deleteClassModal) {
        deleteClassModal.style.display = 'none';
    }
 
}

// --------------------------------------------------------------------------
















