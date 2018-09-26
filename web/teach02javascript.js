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