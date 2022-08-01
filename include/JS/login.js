
// ********************************************************************************************************************************
//when the user changes something in the login form 
// *********************************************************************************************************************************
document.addEventListener('input', function (event) {

    // to hide the error message once the user starts typing
    if (event.target.id === 'userEmail'){

        if(document.getElementById('emailErr').style.visibility == 'visible'){
            document.getElementById('emailErr').style.visibility = 'hidden';          
        }        
    }

    if (event.target.id === 'userPassw'){
              
        if(document.getElementById('passwErr').style.visibility == 'visible'){
            document.getElementById('passwErr').style.visibility = 'hidden';           
        }  
    }
});

// ********************************************************************************************************************************
//when the user submit the the login form 
// *********************************************************************************************************************************
//see if I can do AJAX request from here?

document.getElementById('loginForm').addEventListener('submit', function (event) {

    let input = {       
        Email: document.getElementById('userEmail').value,
        Password: document.getElementById('userPassw').value
    };

    let admin = new FormData();
    admin.append( "CheckAdmin", JSON.stringify(input)); 

    //So here I'm sending a checkAdmin object with the input information to the endpoint so the 
    //admin information can be checked in the backend. Then a flag is returned so I can handle 
    //here what to do when email or passwords are wrong, and if they were correct I redirect 
    //the page. For this to work I had to prevent the default submision (onsubmit='return false')
    //it looks like adding event.preventdefault() also worked here for that. And, also in the back end
    //if right email/password combination was entered a SESSION was created 
    fetch("/ajax/login_admin.php", {
    method: 'post',
    body: admin
    })
    .then(response => response.text())
    .then(data => {    

        if(data == 'Incorrect Email'){
            document.getElementById('emailErr').innerHTML = "The email you've entered is incorrect.";
            document.getElementById('emailErr').style.visibility = 'visible';
            document.getElementById('userEmail').focus();    
        }

        else if(data == 'Incorrect Password'){
            document.getElementById('passwErr').innerHTML = "The password you've entered is incorrect.";
            document.getElementById('passwErr').style.visibility = 'visible';
            document.getElementById('userPassw').focus();
            document.getElementById('userPassw').value = '';
        }  
        
        else{                
            window.location.href = "http://localhost/admin/index.php";      
        }
    })    
        
}), false;

// ********************************************************************************************************************************

