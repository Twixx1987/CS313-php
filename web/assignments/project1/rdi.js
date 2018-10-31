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
        let classes = this.className;

        // get the location of character_ class
        let stringStart = classes.indexOf("character_");

        // find the character_ class name
        let id = "#" + classes.substring(stringStart);
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
        let checkValue = this.value;

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
        let nonUserCount = $(this).val();

        console.log("made it here" + nonUserCount);
        // loop through the count of non-user players
        for (let count = nonUserCount; count > 0; count--) {
            // create an line break
            let lb1 = $("<br />");

            // create an line break
            let lb2 = $("<br />");

            // create an label for an input field and set its attributes
            let label = $("<label><label/>").text("Non-User Player " + count + ":");
            label.attr("class","non_user");
            label.attr("for","non_user_" + count);

            console.log("made it here");
            // create an input field and set its attributes
            let input = $("<input/>");
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
        // get the game id
        let gameId = $('#gameId').val();

        // make sure a game id was entered
        if (gameId > 0) {
            // the AJAX call
            $('#gameIdLoadStatus').load('rdijoingame.php', {gameId: $('#gameId').val()});
        } else {
            $('#gameIdLoadStatus').html('<p class="container error">ERROR: Invalid Game ID ' + gameId + '</p>');
        }
    });

    // a function to create an AJAX call to Start a game
    $('#startGame').click(function() {
        // get the game id
        let playerCount = $('#playerCount').val();

        // make sure a game id was entered
        if (playerCount > 0) {
            // the AJAX call
            $('#gameCreatedStatus').load('rdistartgame.php', {playerCount : $('#playerCount').val()});
        } else {
            $('#gameCreatedStatus').html('<p class="container error">ERROR: Invalid Player Count ' + playerCount + '</p>');
        }
    });

    // a function to update the list of players
    $('#refreshPlayersList').click(function() {
        // get the game id from the page
        let gameId = $('#game_id').text();

        // make an AJAX call to update the players list
        $('#playerList').load('rdigameplayerlist.php', {game_id: gameId});
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

// a function to close an open game and display the character generation
function closeGame(gameId) {
    // use the window.location to redirect to the php page
    window.location.replace("rdiclosegame.php?game_id=" + gameId);
}