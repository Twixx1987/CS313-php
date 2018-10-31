<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // get the data from the request
    $game_id = intval($_GET["game_id"]);

    // Update the game table to indicate the game is closed
    $dbUpdate = $db->prepare('UPDATE rdi_game SET game_open = FALSE WHERE game_id=:game_id AND host_user=:host_user');
    $dbUpdate->execute(array(':game_id' => $game_id, ':host_user' => $user_id));

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
    <title>Game #<?php echo $game_id; ?> Character Selection</title>
</head>
<body>
    <div class="container fixed-top bg-white">
        <h1 class="pagetitle">Game #<?php echo $game_id; ?> Character Selection</h1>
        <div class="menu container bg-secondary">
            <?php include 'rdimenu.php'; ?>
        </div>
    </div>
    <div class="container body">
        <p class="container">Game #<?php echo $game_id; ?> has started!</p>
        <p class="container">Here is the character lineup:</p>
        <ul>
            <?php
            // create the prepared query to find the character name
            $statement = $db->prepare('SELECT c.character_name AS character, up.user_name AS player, up.player_id AS player_id FROM rdi_characters AS c RIGHT JOIN (SELECT p.player_id, p.character_id, u.user_name FROM rdi_player AS p NATURAL JOIN rdi_user AS u WHERE p.game_id=:game_id) AS up ON (c.character_id = up.character_id)');
            $statement->execute(array(':game_id' => $game_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                ?>
                <li><em>
                        <?php
                        echo $row['player'];
                        ?>
                    </em> -
                    <?php
                    echo $row['character'];
                    ?> placed:
                    <input type="number" id="player<?php echo $row['player_id']; ?>" name="player<?php echo $row['player_id']; ?>">
                </li>
            <?php
            endwhile;
            ?>
        </ul>
    </div>
    <br />
    <div class="footer text-sm-center container bg-secondary text-white">
        <?php include 'rdirightsfooter.php'; ?>
    </div>
</body>
</html>
