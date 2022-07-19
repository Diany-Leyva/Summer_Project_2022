// I hide the next class when displaying the next class info so I can access it
//from here and I use it to display the values in the class form to edit a class
// --------------------------------------------------------------------------

function openIndexPageClassForm(classId){  

    let today = document.getElementById('ClassDateIndexPage').value;

    //when editing a class
    if(classId){
 
        //When I used the class form to edit in student profile, I passed an array from php to js using JSON_encode and then parsing 
        //the text to object in js. But in the home page, the next class (array) goes from php to js to be displayed in the next-class block,
        //but then when you click a class in the day calendar I use js to display that class in the next-class block by calling the displayClassInfo
        //function. But there I have to update the hidden class with the one I'm displaying to be able to delete/update that class there. I did so
        //hidding the array as string.. I couldn't pass an array from js to php, so I passed the array as string.
        //So now here I'm creating the object I wanted to pass in the first place. 
        
        let hiddenClassString = document.getElementById('hiddenClass-Edit-IndexPage').value; 
        let hiddenClassIndexedArray = hiddenClassString.split(',');
        let myClass = {
            ClassId: null,
            Type: null,
            ClassDate: null,
            ClassTime: null,
            ZoomLink: null,
            StudentId: null,           
         }       

        //for the same reason I explained above here I'm just trying to populate the object myClass
        //from the string. To do that I split the string first by (,), which will give me an array where first element
        //is like "ClassId: 42", so inside the loop I split each element by (:) and I use it to populate the object on each
        //iteration. Maybe is not very efficient but at the end I haver the object i need lol
        let tempArray;       
        let size = hiddenClassIndexedArray.length;
        for(i = 0; i < size; i++){
            tempArray = hiddenClassIndexedArray[i].split(':');  
            
            if(tempArray[0] == 'ClassTime'){                              //because the time has (:) I need to handle it differently 
                myClass[tempArray[0]] = tempArray[1] +":"+ tempArray[2] ; 
            }

            else{
                myClass[tempArray[0]] = tempArray[1]; 
            }                         
        }
   
        id = "studentId"+myClass.StudentId;                                                                 //This is to get the desired id of the option 
        document.getElementById('studentListIndexPage').value = document.getElementById(id).value;
        document.getElementById('studentListIndexPage').disabled = true;  
        document.getElementById('toggle').disabled = true;
        document.getElementById('dropdownIndexPage').value = myClass.Type;
        document.getElementById('ClassDateIndexPage').value = myClass.ClassDate;
        document.getElementById('clockIndexPage').value = myClass.ClassTime; 
        document.getElementById('zoomLinkIndexPage').value = myClass.ZoomLink;
        document.getElementById('hiddenClassId-Edit-IndexPage').value = myClass.ClassId;
        document.getElementById('submitButtonIndexPage').name = 'EditClassesSubmitted'; 

         //get the studentId and the remaining credits that were hidden in the options
         let studentId = document.getElementById('studentListIndexPage').value;
         let remainingCredits = document.getElementById("credits"+studentId).value;

         //This is to show the remaing credits of each student because if it is zero the 
         //user will need to add a credit before booking the class
         if(remainingCredits > 0){
             document.getElementById('StdCreditAmount').value = remainingCredits;
             document.getElementById('StdCreditAmount').placeholder = remainingCredits;           
         }
         
         else{
             document.getElementById('StdCreditAmount').value = 0;
             document.getElementById('StdCreditAmount').placeholder = 0;            
         }   
              
    }

    //Since these add/edit are used in the same page, I need to reset the values because
    //when I use edit and I want to add a class right after, the add form shows up with
    //the values set above, so we need to re-set this
    else{         
            document.getElementById('toggle').disabled = false;
            document.getElementById('studentListIndexPage').disabled = false;
            document.getElementById('dropdownIndexPage').value = 'Online';    
            document.getElementById('ClassDateIndexPage').value = today;
            document.getElementById('zoomLinkIndexPage').value = '';
            document.getElementById('hiddenClassId-Edit-IndexPage').value = '';
            document.getElementById('submitButtonIndexPage').name = 'AddClassesSubmitted';  

            //get the studentId and the remaining credits that were hidden in the options
            let studentId = document.getElementById('studentListIndexPage').value;
            let remainingCredits = document.getElementById("credits"+studentId).value;

            //This is to show the remaing credits of each student because if it is zero the 
            //user will need to add a credit before booking the class
            if(remainingCredits > 0){
                document.getElementById('StdCreditAmount').value = remainingCredits;
                document.getElementById('StdCreditAmount').placeholder = remainingCredits; 
                document.getElementById('toggle').required = false;
            }
            
            else{
                document.getElementById('StdCreditAmount').value = 0;
                document.getElementById('StdCreditAmount').placeholder = 0;
                document.getElementById('toggle').required = true;
            }
        }

        document.getElementById('classFormIndexPage').style.display = 'block';
}

// This functions allows us to click an event in the calendar and it will display the
//class info in the clss info session. I couln't figure out how to pass the whole object
//by just passing the object name, so I just passed a each element separated by a comma.
//Also I need to also hide the whole class here to be able to edit it when clicking the 
//edit button. Previusly what I have hidden there is the class, or not class at all if
//there is not pedning class so I need to update that value here
// --------------------------------------------------------------------------
function displayClassInfo(classId, Type, StartDate, StartTime, Lichess, Zoom, studentId, fName, lName, Email){ 

    document.getElementById('deletButtonInfoClass').style.visibility = 'visible';
    document.getElementById('showDeleteButton').innerHTML = "<button id='deletButtonInfoClass' class='deleteButton onClassSession zoom' onclick=\"openDeleteClass("+classId+")\">🗑</button>";
    document.getElementById('showEditButton').innerHTML = "<button id='EditButtonInfoClass' class='editButton onClassSession zoom' onclick=\"openIndexPageClassForm("+classId+")\">✏️</button>";
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
    document.getElementById('horizontalMenu').scrollIntoView({behavior: 'smooth'});                        //to jump to that id in screen
    
    //Here I need to pass the array from js to php, and I spent more time that what I planned trying to figure that out, so I decided to 
    //pass a string instead and then create the object I need by manipulation the string. I used const just to emphasy that it should not be changed here  
    const classArray = "ClassId:"+classId+",Type:"+Type+",ClassDate:"+StartDate+",ClassTime:"+StartTime+",ZoomLink:"+Zoom+",StudentId:"+studentId;
    document.getElementById('hiddenClass-Edit-IndexPage').value = classArray;
    
    }

//Event listener for input
// *********************************************************************************************************************************

document.addEventListener('input', function (event) {

	// Only run for #studentListIndexPage select (this is the name selection in the class form on home page)
    if (event.target.id === 'studentListIndexPage'){

    //uncheck the toggle, in case was checked previusly
    document.getElementById('toggle').checked = false;
    document.getElementById('zoomLinkIndexPage').value = '';

    //update the remaing credits
    let studentId = document.getElementById('studentListIndexPage').value;
    let remainingCredits = document.getElementById("credits"+studentId).value;
  
    if(remainingCredits > 0){
        document.getElementById('StdCreditAmount').value = remainingCredits;
        document.getElementById('StdCreditAmount').placeholder = remainingCredits; 
        document.getElementById('toggle').required = false;
    }

    else{
        document.getElementById('StdCreditAmount').value = 0;
        document.getElementById('StdCreditAmount').placeholder = 0;
        document.getElementById('toggle').required = true;
    }
  
    //Update the element with the remaining credits
    console.log(document.getElementById('StdCreditAmount').required);
}

	// Only run for #toggle changed
    if (event.target.id === 'toggle'){
        
        if(document.getElementById('toggle').checked == true){
            let amount = document.getElementById('StdCreditAmount').value;
            document.getElementById('StdCreditAmount').value = ++amount;
            document.getElementById('StdCreditAmount').placeholder = document.getElementById('StdCreditAmount').value;           
        }

        else{
            let amount = document.getElementById('StdCreditAmount').value;
            document.getElementById('StdCreditAmount').value = --amount;
            document.getElementById('StdCreditAmount').placeholder = document.getElementById('StdCreditAmount').value;           
        }
      
    }

});

// //when the user submit the classFormIndexPage form 
// // *********************************************************************************************************************************

// document.getElementById('classFormIndexPage').addEventListener('submit', function (event) {
//     //This look like a good place to check for the classes availability but I will wait for our next jog (maybe you
//     //are reading this and we already talked about it lol, to see what you recomend to handle classes conflict)
    
    
// }), false;

// *********************************************************************************************************************************

function closeIndexPageClassForm() {          
      
    document.getElementById('classFormIndexPage').style.display = 'none';

    //I'm reloading the page because I changed a lot of option within the class form (the time to show in the clock
    //for instance) so if I reload the page I get all the values back to when the form was created 
    location.reload();  
    exit();                                                     
}

//Delete class form
// --------------------------------------------------------------------------

// function openDeleteClass(classId) {
//     document.getElementById('hiddenClassId-Delete').value = classId;
//     document.getElementById('deleteClass').style.display = 'block';
//  }
 
//  function closeDeleteClass() {
//      document.getElementById('deleteClass').style.display = 'none';
//  }  

 
// When the user clicks anywhere outside of the modal, close it
// --------------------------------------------------------------------------

let classFormIndexPage = document.getElementById('classFormIndexPage');
let deleteClassModal = document.getElementById('deleteClass');

window.onclick = function(event) { 

    if (event.target == classFormIndexPage) {
        classFormIndexPage.style.display = 'none';
    }

    if (event.target == deleteClassModal) {
        deleteClassModal.style.display = 'none';
    }
 
}

// --------------------------------------------------------------------------