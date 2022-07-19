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
let studentFormModal = document.getElementById('studentForm');
let deleteStudentModal = document.getElementById('deleteStudent');

window.onclick = function(event) {

    if (event.target == studentFormModal) {
        studentFormModal.style.display = 'none';
    }

    if (event.target == deleteStudentModal) {
        deleteStudentModal.style.display = 'none';
    }
}

// --------------------------------------------------------------------------













