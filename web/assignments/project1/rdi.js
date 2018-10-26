// a function to check all versions and characters
$(document).ready(function(){
    // select all was clicked
   $('#selectAll').click(function() {
       $(':checkbox').attr("checked", true);
   });
});

// a function to clear all versions and characters
$(document).ready(function(){
    // select all was clicked
    $('#clearAll').click(function() {
        $(':checkbox').removeAttr("checked");
    });
});

// a function to check the characters of selected version
$(document).ready(function(){
    // version was clicked
    $('.versionSelector').change(function() {
        // get the version value
        var checkValue = this.value;

        // check the status of the activating object
        if (this.checked == true) {
            // uncheck all characters from that version
            $("." + checkValue).attr("checked", true);
        } else {
            // uncheck all characters from that version
            $("." + checkValue).removeAttr("checked");
        }
    });
});