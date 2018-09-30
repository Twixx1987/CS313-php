// JavaScript source code

// a function to zoom in on the image
$(document).ready(
    function () {
        $("#dolskuggar").mouseenter(function () {
            $("#dolskuggar").animate({
                right: '500px',
                width: '440px',
                height: '550px',
                float: none
            }, "slow");
        });
    });

// a function to return the the image to original size
$(document).ready(
    function () {
        $("#dolskuggar").mouseleave(function () {
            $("#dolskuggar").animate({
                left: '500px',
                width: '120px',
                height: '150px',
                float: left
            }, "slow");
        });
    });