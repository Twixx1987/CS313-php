<?php
// include the DB connection
require 'rdidbconnect.php';

// include the logged in verification
require 'rdiverifylogin.php';
?>
<ul>
    <?php
    // get the game id from the request
    $game_id = intval($_POST["game_id"]);

    // create the prepared query to find the character name
    $statement = $db->prepare('SELECT u.user_name AS player FROM rdi_user AS u NATURAL JOIN rdi_player AS p WHERE p.game_id=:game_id');

    // run the query
    $statement->execute(array(':game_id' => $game_id));
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
    ?>
    <li>
        <?php
            echo $row['player'];
        ?>
    </li>
    <?php
        endwhile;
    ?>
</ul>
