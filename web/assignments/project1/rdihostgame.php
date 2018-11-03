<?php
// include the DB connection
require 'rdidbconnect.php';

// include the logged in verification
require 'rdiverifylogin.php';
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
    <title>Host a New Game</title>
</head>
<body>
    <div class="container fixed-top bg-white">
        <h1 class="pagetitle">Host a New Game</h1>
        <div class="menu container bg-secondary">
            <?php include 'rdimenu.php'; ?>
        </div>
    </div>
    <div class="container body">
        <h2>Host a Game</h2>
        <div class="container">
            <p>To host a game you first need to ensure that you have setup the character
                choices on the settings page. You will need to provide a Game ID to the
                players that will join. This ID will be provided once the game is
                initialized. Please enter the following information to start hosting a
                new game.</p>
        </div>
        <div id="gameCreatedStatus">
            <p id="hostGameError"></p>
            <label for="playerCount">Anticipated number of players:</label>
            <br />
            <input type="number" id="playerCount" name="playerCount" />
            <br />
            <button id="startGame" name="startGame" class="btn btn-secondary button" onclick="">Host Game</button>
        </div>
    </div>
    <br />
    <div class="footer text-sm-center container bg-secondary text-white">
        <?php include 'rdirightsfooter.php'; ?>
    </div>
</body>
</html>