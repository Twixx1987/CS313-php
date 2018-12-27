<?php
// include the DB connection
require 'rdidbconnect.php';

// include the logged in verification
require 'rdiverifylogin.php';

// get the data from the request
$game_id = intval($_GET["game_id"]);
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
    <title>Game Details</title>
</head>
<body>
<div class="container fixed-top bg-white">
    <h1 class="pagetitle">Game Details</h1>
    <nav class="navbar navbar-expand-lg navbar-light menu bg-light">
        <?php include 'rdimenu.php'; ?>
    </nav>
</div>
<div class="container body">
    <h2>Game #<span id="game_id"><?php echo $game_id; ?></span></h2>
    <div id="gameCreatedStatus">
        <p class="container">The following players have joined your game:</p>
        <div id="playerList" class="container">
            <ul>
                <?php
                // create the prepared query to find the character name
                $query = "SELECT u.user_name AS player 
                      FROM rdi_user AS u 
                      NATURAL JOIN rdi_player AS p 
                      WHERE p.game_id=:game_id";
                $statement = $db->prepare($query);

                // run the query
                $statement->execute(array(':game_id' => $game_id));
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <li><?php echo $row['player']; ?></li>
                <?php
                endwhile;
                ?>
            </ul>
        </div>
        <button class="btn btn-secondary button" id="refreshPlayersList" name="refreshPlayersList" onclick="">
            Refresh Players List</button>
        <button class="btn btn-secondary button" id="closeGame" name="closeGame"
                onclick="closeGame(<?php echo $game_id; ?>)">Generate Characters</button>
    </div>
</div>
<br />
<div class="footer text-sm-center container bg-secondary text-white">
    <?php include 'rdirightsfooter.php'; ?>
</div>
</body>
</html>