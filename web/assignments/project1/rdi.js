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
        console.log($(id));

        // check the status of the associated checkbox
        if ($(id).checked === undefined) {
            // uncheck all characters from that version
            $(id).attr("checked", true);
            $(this).css("background-color", "#fabdb8");
            console.log($(id).checked);
        } else if ($(id).checked === "checked") {
            // uncheck all characters from that version
            $(id).removeAttr("checked");
            $(this).css("background-color", "white");
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
});