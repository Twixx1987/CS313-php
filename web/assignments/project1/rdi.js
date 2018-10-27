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

        // get the value
        var nonUserCount = $(this).value;

        // loop through the count of non-user players
        for (var count = nonUserCount; count > 0; count--) {
            // create an line break
            var lineBreak = $("<br />");

            // create an label for an input field and set its attributes
            var label = $("<label><label/>");
            label.attr("class","non_user");
            label.attr("for","non_user_" + count);

            // create an input field and set its attributes
            var input = $("<input/>");
            input.attr("type", "text");
            input.attr("class","non_user");
            input.attr("id","non_user_" + count);
            input.attr("name","non_user_" + count);

            // insert the new label and input field after the number prompt
            $(this).after(lineBreak, label, lineBreak, input);
        }
    });
});