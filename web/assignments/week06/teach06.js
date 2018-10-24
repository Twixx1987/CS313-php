// an ajax function to submit the data and update the display
function ajaxSubmit() {
    // create the FormData object
    var formData = new FormData(document.forms.namedItem("scriptureForm"));

    // initiate the XMLHttpRequest
    var xmlhttp = new XMLHttpRequest();

    // create the request function
    xmlhttp.onreadystatechange = function() {
        // check for completion and ok status
        if (this.readyState == 4 && this.status == 200) {
            // initiate function to update the display
            document.getElementById("scriptureList").innerHTML = this.responseText;
        }
    }
    // create the request specifics
    xmlhttp.open("POST", "teach06ajaxdata.php", true);

    // send the request to the server
    xmlhttp.send(formData);
}