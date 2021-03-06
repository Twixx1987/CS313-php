﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS and Custom Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="teach02style.css" />
    
    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="teach02javascript.js"></script>

    <!-- Page title -->
    <title>Teach 02 - CS313 - Shaun Densley</title>
</head>
<body>
    <h1 class="container">Teach 02</h1>
    <div class="menu container">
        <?php include '../../top_menu.php'; ?>
    </div>
    <div id="one" class="card border-dark mb-3 card-width card-body bg-light container">
        <p>Here is some sample text for div one.</p>
    </div>
    <form id="frmOne"  class="container">
        Pick a color: <input type="color" name="inColor" class="btn-outline-success rounded"/>
        <br />
        Click on this button to change this div's color. <button type="button" onclick="changeColor()" id="btnChangeColor" class="btn btn-outline-success btn-sm">Change color</button>
    </form>
    <br/>
    <div id="two" class="card border-dark mb-3 card-width card-body bg-light container">
        <p>Let's also add some sample text for div two.</p>
    </div>
    <form id="frmTwo" class="container">
        Enter a Hexadecimal color code: <input type="color" name="inColor2" class="btn-outline-success rounded" />
        <br />
        Click on this button to change the second div's color. <button type="button" id="btnChangeColor2" class="btn btn-outline-success btn-sm">Change color</button>
    </form>
    <div class="container">
		<button id="btnToggleDiv3" class="btn btn-outline-success btn-sm">Toggle div three!</button>
		<br /><br />
	    <button onclick="clickAlert()" id="btnClickMe" class="btn btn-outline-success btn-sm">Click Me!</button>
	<br/><br />
    </div>
    <div id="three" class="card boarder-dark mb-3 card-width card-body bg-light container">
        <p>Some sample text for div three should probably be included as well. Also, this text will fade with the click of a button, specifically the button labeled Toggle div three!</p>
    </div>
</body>
</html>