// JavaScript source code

// a function to zoom in on the image
$(document).ready(
    function () {
        $("#dolskuggar").mouseenter(function () {
            $("#dolskuggar").animate({
                right: '500px',
                width: '400px',
                height: '500px'
            }, "slow");
        });
    });

// a function to return the the image to original size
$(document).ready(
    function () {
        $("#dolskuggar").mouseleave(function () {
            $("#dolskuggar").animate({
                left: '500px',
                width: '40px',
                height: '50px'
            }, "slow");
        });
    });