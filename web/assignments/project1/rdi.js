// jQuery functions to process clicks
$(document).ready(function(){
    // a function to check all versions and characters
   $('#selectAll').click(function() {
       // set the checked attribute
       $(':checkbox').attr("checked", true);
       // set the background color
       $('tr').css("background-color", "#fabdb8");
   });

    // a function to clear all versions and characters
    $('#clearAll').click(function() {
        // remove the checked attribute
        $(':checkbox').removeAttr("checked");
        // set the background color
        $('tr').css("background-color", "white");
    });

    // a function to check the characters
    $('.character').click(function() {
        // get the version value
        var classes = this.className;

        // get the location of character_ class
        var stringStart = classes.indexOf("character_");

        // find the character_ class name
        var id = "#" + classes.substring(stringStart);
        console.log(id);
        console.log(document.getElementById(id));

        // check the status of the associated checkbox
        if ($(id).checked === "checked") {
            // uncheck the character
            $(id).removeAttr("checked");
            $(this).css("background-color", "white");
        } else {
            // check the character
            $(id).attr("checked", true);
            $(this).css("background-color", "#fabdb8");
            console.log($(id).checked);
        }
    });

    // a function to check the characters of selected version
    $('.versionSelector').change(function() {
        // get the version value
        var checkValue = this.value;

        // check the status of the activating object
        if (this.checked === true) {
            // check all characters from that version
            $("." + checkValue).attr("checked", true);
            $("." + checkValue).css("background-color", "#fabdb8");
        } else {
            // uncheck all characters from that version
            $("." + checkValue).css("background-color", "white");
            $("." + checkValue).removeAttr("checked");
        }
    });

    // a function to add any non-user name entry input fields
    $('#nonUsers').blur(function() {
        // remove any existing non_user class inputs and labels
        $("label").remove(".non_user");
        $("input").remove(".non_user");
        console.log("made it here");

        // get the value
        var nonUserCount = $(this).val();

        console.log("made it here" + nonUserCount);
        // loop through the count of non-user players
        for (var count = nonUserCount; count > 0; count--) {
            // create an line break
            var lb1 = $("<br />");

            // create an line break
            var lb2 = $("<br />");

            // create an label for an input field and set its attributes
            var label = $("<label><label/>").text("Non-User Player " + count + ":");
            label.attr("class","non_user");
            label.attr("for","non_user_" + count);

            console.log("made it here");
            // create an input field and set its attributes
            var input = $("<input/>");
            input.attr("type", "text");
            input.attr("class","non_user");
            input.attr("id","non_user_" + count);
            input.attr("name","non_user_" + count);

            console.log("made it here");
            // insert the new label and input field after the number prompt
            $(this).after(lb1, label, lb2, input);
            console.log("made it here");
        }
    });

    // a function to create an AJAX call to join a game
    $('#joinGame').click(function() {
        // the AJAX call
        $('#gameIdLoadStatus').load('rdijoingame.php', {gameId: $('#gameId').val()});
    });

    // a function to create an AJAX call to Start a game
    $('#startGame').click(function() {
        // the AJAX call
        $('#gameCreatedStatus').load('rdistartgame.php', {playerCount : $('#playerCount').val() })
    });
});

// a function to check the password for matching, length, and at least one numerical character
function validateForm(){
    // get the password values
    let pass1 = document.getElementById("password").value;
    let pass2 = document.getElementById("password2").value;

    // get the length of password
    let passLength = pass1.length;

    // verify passwords match and length is greater than 7
    if (pass1 == pass2 && passLength > 7) {
        //return true form is valid
        return true;
    } else {
        // set the error messages
        document.getElementById("topError").innerHTML = "<p class='error'>Password Requirements: </p>"
            + "<p class='error'>Passwords must match. </p>"
            + "<p class='error'>Passwords must contain a minimum of 8 characters. </p>";

        document.getElementById("sideError1").innerHTML = "*";
        document.getElementById("sideError2").innerHTML = "*";

        // return false failed to validate properly
        return false;
    }

    return false;
}