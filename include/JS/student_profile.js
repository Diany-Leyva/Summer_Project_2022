
// ********************************************************************************************************************************
//Save notes
// ********************************************************************************************************************************

function showSaveButton(heading){   
    document.getElementById(heading).style.visibility = 'visible';
}

// ********************************************************************************************************************************
//Saving the notes using AJAX seems like a good idea to me since I want that to be
//saved without reloading the page
// ********************************************************************************************************************************

function savePrivateNotes(studentId){

    let note = {       
        StudentId: studentId,
        Notes: document.getElementById('privateNotesTextarea').value
    };

    let notes = new FormData();
    notes.append( "SavePrivateNotes", JSON.stringify(note));     

    //So here I'm trusting that the DB was updated, in the future I could return a flag from
    //the backend or something to indicate that the DB was update it 
    fetch("/ajax/save_private_notes.php", {
    method: 'post',
    body: notes
    })    
}

// ********************************************************************************************************************************

function savePublicNotes(studentId){

    let note = {       
        StudentId: studentId,
        Notes: document.getElementById('publicNotesTextarea').value
    };

    let notes = new FormData();
    notes.append( "SavePublicNotes", JSON.stringify(note));     

    //So here I'm trusting that the DB was updated, in the future I could return a flag from
    //the backend or something to indicate that the DB was update it 
    fetch("/ajax/save_public_notes.php", {
    method: 'post',
    body: notes
    })    
}

// ********************************************************************************************************************************
//Event listener for input
// *********************************************************************************************************************************

document.addEventListener('input', function (event) {

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
// When the user clicks anywhere outside of the modal, close it
// ********************************************************************************************************************************

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

// ********************************************************************************************************************************
















