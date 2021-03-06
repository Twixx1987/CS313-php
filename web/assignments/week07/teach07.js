// a function to check the password for matching, length, and at least one numerical character
function validateForm(){
    // get the password values
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("password2").value;

    console.log("pass1 = " + pass1 + " pass2 = " + pass2);

    // get the length of password
    let passLength = pass1.length;

    console.log("pass1.length = " + passLength);

    // use regex to check for a number in password
    let number = pass1.search(/\d/);

    console.log("number = " + number);

    if (pass1 == pass2 && passLength > 6 && number != -1) {
        //return true form is valid
        return true;
    } else {
        // set the error messages
        document.getElementById("topError").innerHTML = "<p class='error'>Password Requirements: </p>"
                            + "<p class='error'>Passwords must match. </p>"
                            + "<p class='error'>Passwords must contain a minimum of 7 characters. </p>"
                            + "<p class='error'>Passwords must include at least one number.</p>"

        document.getElementById("sideError1").innerHTML = "*";
        document.getElementById("sideError2").innerHTML = "*";

        // return false failed to validate properly
        return false;
    }

    return false;
}