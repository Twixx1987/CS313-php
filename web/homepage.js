// JavaScript source code

// a function to zoom in on the image
$(document).ready(
    function () {
        $("#dolskuggar").mouseenter(function () {
            $("#dolskuggar").animate({
                right: '250px',
                width: '400px',
                height: '500px'
            }, "slow");
        });
    });