<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // get the data from the request
    $game_id = intval($_POST["game_id"]);

    // Update the game table to indicate the game is closed
    $dbInsert = $db->prepare('UPDATE rdi_game SET game_open = FALSE WHERE game_id=:game_id');
    $dbInsert->execute(array(':game_id' => $game_id));

    // output a joined game message
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
            <div id="gameIdLoadStatus">
                <p>To join a game you will need the Game ID provided to the game host.</p>
                <label for="gameId">Enter the Game ID provided to the game host:</label>
                <br />
                <input type="text" id="gameId" name="gameId" />
                <br />
                <br />
                <button id="joinGame" name="joinGame" onclick="">Join Game</button>
            </div>
        </div>
        <div class="col-lg">
            <h2>My Open Games</h2>
            <?php
            // create the prepared query to find the open games the player has joined
            $statement = $db->prepare('SELECT g.game_id AS game_id, g.player_count AS player_count, COUNT(p.player_id) AS joined_players FROM rdi_game AS g NATURAL JOIN rdi_player AS p WHERE g.host_user = :user_id AND g.game_open = TRUE GROUP BY g.game_id, g.player_count');

            // run the query
            $statement->execute(array(':user_id' => $user_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                ?>
                <p>
                    <a href="rdiclosegame.php?game_id=<?php echo $row['game_id']; ?>">Game #
                        <?php echo $row['game_id']; ?> has <?php echo $row['joined_players']; ?>
                        player(s) of the anticipated <?php echo $row['player_count']; ?>
                    </a>
                </p>
            <?php
            endwhile;
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <h2>Host a Game</h2>
            <p>To host a game you first need to ensure that you have setup the character
                choices on the settings page. You will need to provide a Game ID to the
                players that will join. This ID will be provided once the game is
                initialized.</p>
            <button id="hostGame" name="hostGame" onclick="">Host Game</button>
        </div>
    </div>
</div>
</body>
</html>
<p class="container">Game #<?php echo $game_id; ?> has started!</p>
<p class="container">Here is the character lineup:</p>
<ul>
    <?php
    // create the prepared query to find the character name
    $statement = $db->prepare('SELECT c.character_name AS character, up.user_name AS player FROM rdi_characters AS c RIGHT JOIN (SELECT p.character_id, u.user_name FROM rdi_player AS p NATURAL JOIN rdi_user AS u WHERE p.game_id=:game_id) AS up ON (c.character_id = up.character_id)');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
    ?>
    <li><em>
        <?php
            echo $row['player'];
        ?>
        </em> -
        <?php
            echo $row['character'];
        ?>
    </li>
    <?php
        endwhile;
    ?>
</ul>
