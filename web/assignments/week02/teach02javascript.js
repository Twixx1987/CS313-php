// JavaScript source code

// a function that displays the alert "You Clicked the button!"
function clickAlert() {
    alert("You Clicked the button!");
}

// a function to change the color of the div
function changeColor() {
    var newColor = document.forms['frmOne'].elements[0].value;
    document.getElementById('one').style.color = newColor;
}

// a function to change the color of div two
$(document).ready(
    function () {
        $("#btnChangeColor2").click(function () {
            $("#two").css("color", $("input[name=inColor2]").val());
        });
    });

// a function to change the visibility of div three
$(document).ready(
    function () {
        $("#btnToggleDiv3").click(function () {
            $("#three").fadeToggle("slow");
        });
    });