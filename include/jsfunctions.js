     
     
function openCreditForm(){
    document.getElementById('addCreditsForm').style.display = 'block';
}
    
function closeCreditForm(){
    document.getElementById('addCreditsForm').style.display = 'none';
}

function openClassForm() {
    document.getElementById('addClassForm').style.display = 'block';
}

function closeClassForm() {
    document.getElementById('addClassForm').style.display = 'none';
}

// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}





















