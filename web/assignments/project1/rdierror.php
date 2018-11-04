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
        <title>Track RDI Games</title>
    </head>
    <body>
        <div class="container fixed-top bg-white">
            <h1 class="pagetitle">My Open RDI Games</h1>
            <div class="menu container bg-secondary">
                <?php include 'rdimenu.php'; ?>
            </div>
        </div>
        <div class="container body">
            <h2 class="error">ERROR: Unable to close a game with only one player.</h2>
            <p>Please verify that you have the correct game number. A game requires at least two players to track.</p>
            <h2>My Open Games</h2>
            <?php
            // create the prepared query to find the open games the player has joined
            $query = "SELECT g.game_id AS game_id, g.player_count AS player_count, COUNT(p.player_id) AS joined_players 
                      FROM rdi_game AS g 
                      NATURAL JOIN rdi_player AS p 
                      WHERE g.host_user = :user_id AND g.game_open = TRUE 
                      GROUP BY g.game_id, g.player_count";
            $statement = $db->prepare($query);

            // run the query
            $statement->execute(array(':user_id' => $user_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                ?>
                <p onclick="gameDetails(<?php echo $row['game_id']; ?>)" class="psuedoLink">Game #
                    <?php echo $row['game_id']; ?> has <?php echo $row['joined_players']; ?>
                    of the anticipated <?php echo $row['player_count']; ?> players. Click to see details.
                </p>
            <?php
            endwhile;
            ?>
        </div>
        <br />
        <div class="footer text-sm-center container bg-secondary text-white">
            <?php include 'rdirightsfooter.php'; ?>
        </div>
    </body>
</html>