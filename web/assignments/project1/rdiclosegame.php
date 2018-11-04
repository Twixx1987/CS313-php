<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // get the data from the request
    $game_id = intval($_GET["game_id"]);

    // create the query to verify joined players
    $query = "SELECT g.player_count AS player_count, COUNT(p.player_id) AS joined_players 
              FROM rdi_game AS g 
              LEFT JOIN rdi_player AS p
              ON (g.game_id=p.game_id) 
              WHERE g.host_user = :host_user AND g.game_id = :game_id AND g.game_open = TRUE 
              GROUP BY g.player_count
              LIMIT 1";
    $dbSelect = $db->prepare($query);
    $result = $dbSelect->execute(array(':game_id' => $game_id, ':host_user' => $user_id));

    var_dump($result);
    // check the joined players to the player count
    if ($result[0]['joined_players'] > 2 && $result[0]['joined_players'] <= $result[0]['player_count']) {
        // Update the game table to indicate the game is closed
        $updateQuery = "UPDATE rdi_game 
                        SET game_open = FALSE 
                        WHERE game_id=:game_id AND host_user=:host_user";
        $dbUpdate = $db->prepare($updateQuery);
        $dbUpdate->execute(array(':game_id' => $game_id, ':host_user' => $user_id));
    }  else {
        // clean the output buffer
        //ob_clean();

        // redirect to an error page based on code from https://www.bing.com/videos/search?q=how+to+redirect+to+another+page+using+php&view=detail&mid=09FEDBEAEB640A5D76BE09FEDBEAEB640A5D76BE&FORM=VIRE
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/assignments/project1/rdierror.php', true, 303);

        // terminate php script upon redirect
        die();
    }
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
        <h2 class="container">Game #<?php echo $game_id; ?> has started!</h2>
        <p class="container">Below is the character lineup. As players are eliminated please indicate which
            placement they received. The last surviving player receives placement 1 and subsequent players
            rank accordingly.</p>
        <form action="rdicompletegame.php" method="POST" id="completeGameFrm">
            <table class="noBorder">
                <tr>
                    <th class="noBorder">Player</th>
                    <th class="noBorder">Character</th>
                    <th class="noBorder">Placement</th>
                </tr>
                <?php
                // create the prepared query to find the character name
                $selectQuery2 = "SELECT c.character_name AS character, up.user_name AS player, up.player_id AS player_id 
                                 FROM rdi_characters AS c 
                                 RIGHT JOIN 
                                  (SELECT p.player_id, p.character_id, u.user_name 
                                   FROM rdi_player AS p 
                                   NATURAL JOIN rdi_user AS u 
                                   WHERE p.game_id=:game_id) AS up 
                                 ON (c.character_id = up.character_id)";
                $statement = $db->prepare($selectQuery2);
                $statement->execute(array(':game_id' => $game_id));
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <tr class="noBorder">
                        <td class="noBorder"><em>
                            <?php
                            echo $row['player'];
                            ?>
                        </em></td>
                        <td class="noBorder">
                            <?php
                            echo $row['character'];
                            ?>
                        </td>
                        <td class="noBorder">
                            <input type="number" id="player<?php echo $row['player_id']; ?>"
                                   name="player<?php echo $row['player_id']; ?>">
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>
            </table>
            <br />
            <input class="d-none" type="number" value="<?php echo $game_id; ?>" id="game_id" name="game_id">
            <input type="submit" id="completeGame" class="btn btn-secondary button" value="Complete Game">
        </form>
    </div>
    <br />
    <div class="footer text-sm-center container bg-secondary text-white">
        <?php include 'rdirightsfooter.php'; ?>
    </div>
</body>
</html>
