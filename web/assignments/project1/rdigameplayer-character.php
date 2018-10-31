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
