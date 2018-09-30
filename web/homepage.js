// JavaScript source code

// a function to zoom in on the image
$(document).ready(
    function () {
        $("#dolskuggar").mouseenter(function () {
            $("#dolskuggar").animate({
                width: '440px',
                height: '550px'
            }, "fast");
        });
    });

// a function to return the the image to original size
$(document).ready(
    function () {
        $("#dolskuggar").mouseleave(function () {
            $("#dolskuggar").animate({
                width: '160px',
                height: '200px'
            }, "slow");
        });
    });