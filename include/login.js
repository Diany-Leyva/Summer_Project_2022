
// ********************************************************************************************************************************
//when the user changes something in the login form 
// *********************************************************************************************************************************
document.addEventListener('input', function (event) {

    // to hide the error message once the user starts typing
    if (event.target.id === 'userEmailId'){
        document.getElementById('emailErr').style.visibility = 'hidden';
    }

    if (event.target.id === 'userPasswId'){
               document.getElementById('passwErr').style.visibility = 'hidden';
    }

});

// ********************************************************************************************************************************
//when the user submit the the login form 
// *********************************************************************************************************************************

document.getElementById('loginFormId').addEventListener('submit', function (event) {

    let hiddenAdminInfoArray = document.getElementById('hiddenAdminInfoArray').value;
    const adminInfo = JSON.parse(hiddenAdminInfoArray);

    //here I get the email and passwords the user entered and I check if it is correct, if is not, I
    //show the correct error messages
    //I know there will only be one admin now so I won't loop
    if(document.getElementById('userEmailId').value != adminInfo.Email){
        document.getElementById('emailErr').innerHTML = "The email you've entered is incorrect.";
        document.getElementById('emailErr').style.visibility = 'visible';
        document.getElementById('userEmailId').focus();     
        event.preventDefault();      
    }

    else if(document.getElementById('userPasswId').value != adminInfo.Password){
        document.getElementById('passwErr').innerHTML = "The password you've entered is incorrect.";
        document.getElementById('passwErr').style.visibility = 'visible';
        document.getElementById('userPasswId').focus();
        document.getElementById('userPasswId').value = '';      
        event.preventDefault();   
    }   
    
}), false;

// ********************************************************************************************************************************