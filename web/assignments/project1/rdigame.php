<?php
    //start the session
    session_start();

    // include the logged in verification
    require 'rdiverifylogin.php';

    // include the DB connection
    require 'rdidbconnect.php';
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS and Custom Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="rdi.css" />
    
    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="rdi.js"></script>

    <!-- Page title -->
    <title>Play RDI</title>
</head>
<body>
	<h1 class="pagetitle container">Play RDI</h1>
	<div class="menu container">
		<?php include 'rdimenu.php'; ?>
	</div>
	<div class="container">
        <div class="row">
            <div class="col-sm">
                <h2>Join a Game</h2>
                <p>To join a game you will need the Game ID provided to the game host.</p>
                <label for="gameId">Enter the Game ID provided to the game host:</label>
                <br />
                <input type="text" id="gameId" name="gameId" />
                <br />
                <br />
                <button id="joinGame" name="joinGame" onclick="">Join Game</button>
            </div>
            <div class="col-lg">
                <h2>Host a Game</h2>
                <p>To host a game you first need to ensure that you have setup the character
                    choices on the settings page. You will need to provide a Game ID to the
                    players that will join. This ID will be provided once the game is
                    initialized. Please enter the following information to start hosting a
                    new game.</p>
                <label for="playerCount">Anticipated number of players:</label>
                <br />
                <input type="number" id="playerCount" name="playerCount" />
                <br />
                <br />
                <label for="nonUsers">Anticipated number of players that will not use this program:</label>
                <input type="number" id="nonUsers" name="nonUsers" />
                <br />
                <button id="startGame" name="startGame" onclick="">Host Game</button>
            </div>
	    </div>
    </div>
</body>
</html>