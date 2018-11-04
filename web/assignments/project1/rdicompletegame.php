<?php
// include the DB connection
require 'rdidbconnect.php';

// include the logged in verification
require 'rdiverifylogin.php';

// get the game id from the request
$game_id = intval($_POST["game_id"]);

// get the data from the request
foreach ($_POST as $key => $value) {
    // check if the key starts with "player"
    if (strpos($key, "player") !== false) {
        // replace the "player" part of the key and get the intval of the remaining number
        $player_id = intval(str_replace("player","", $key));

        // get the placement as an integer
        $placement = intval($value);

        // create the query to update the player table with the placement
        $query = "UPDATE rdi_player SET placement = :placement 
                  WHERE game_id = :game_id AND player_id = :player_id";
        $dbUpdate = $db->prepare($query);
        $dbUpdate->execute(array(':placement' => $placement, ':game_id' => $game_id, ':player_id' => $player_id));
    }
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
    <title>Game #<?php echo $game_id; ?> Results Summary</title>
</head>
<body>
<div class="container fixed-top bg-white">
    <h1 class="pagetitle">Game #<?php echo $game_id; ?> Results Summary</h1>
    <div class="menu container bg-secondary">
        <?php include 'rdimenu.php'; ?>
    </div>
</div>
<div class="container body">
    <h2 class="container">Game #<?php echo $game_id; ?> has completed!</h2>
    <p class="container">Below is the results. The last surviving player received placement 1 and subsequent players
        ranked accordingly.</p>
    <table class="noBorder">
        <tr>
            <th class="noBorder">Player</th>
            <th class="noBorder">Character</th>
            <th class="noBorder">Placement</th>
        </tr>
        <?php
        // create the prepared query to find the character name
        $selectQuery2 = "SELECT c.character_name AS character, up.user_name AS player, up.placement AS placement 
                             FROM rdi_characters AS c 
                             RIGHT JOIN 
                              (SELECT p.placement, p.character_id, u.user_name 
                               FROM rdi_player AS p 
                               NATURAL JOIN rdi_user AS u 
                               WHERE p.game_id=:game_id) AS up 
                             ON (c.character_id = up.character_id)
                             ORDER BY up.placement";
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
                    <?php
                    echo $row['placement'];
                    ?>
                </td>
            </tr>
        <?php
        endwhile;
        ?>
    </table>
    <br />
</div>
<br />
<div class="footer text-sm-center container bg-secondary text-white">
    <?php include 'rdirightsfooter.php'; ?>
</div>
</body>
</html>
