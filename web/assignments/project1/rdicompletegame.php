<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // get the data from the request
    $player_count = intval($_POST["playerCount"]);

    // create the prepared query to create the game_id
    $dbInsert = $db->prepare('INSERT INTO rdi_game (player_count) VALUES (:player_count)');
    $dbInsert->execute(array(':player_count' => $player_count));

    // get the game id
    $game_id = $db->lastInsertId('rdi_game_game_id_seq');

    // get the characters array from the session
    $characters = $_SESSION["characters"];

    // create a random keys array
    $rand_keys = array_rand($characters, $player_count);

    // add random characters equal to the number of anticipated players
    for ($count = 1; $count < $player_count; $count++) {
        // get the character id
        $character_id = $characters[$rand_keys[$count]];

        // parse out the 'character_' part of the character id
        $character_id = intval(str_replace("character_","", $character_id));

        // create the prepared query to add the game characters
        $dbInsert2 = $db->prepare('INSERT INTO rdi_game_characters (game_id, character_id) VALUES (:game_id, :character_id)');
        $dbInsert2->execute(array(':game_id' => $game_id, ':character_id' => $character_id));
    }

    // get the first character from the array
    $character_id = $characters[$rand_keys[0]];

    // parse out the 'character_' part of the character id
    $character_id = intval(str_replace("character_","", $character_id));

    // insert creator into the game
    $dbInsert3 = $db->prepare('INSERT INTO rdi_player (game_id, user_id, character_id) VALUES (:game_id, :user_id, :character_id)');
    $dbInsert3->execute(array(':game_id' => $game_id, ':user_id' => $user_id, ':character_id' => $character_id));

// output a joined game message
?>
<p class="container">SUCCESS: You have created Game #<?php echo $game_id; ?></p>
<p class="container">The characters selected along with who will play them are:</p>
<ul>
    <?php
    // create the prepared query to find the character name
    $statement = $db->prepare('SELECT c.character_name AS character, up.user_name AS player FROM rdi_characters AS c LEFT JOIN (SELECT p.character_id, u.user_name FROM rdi_player AS p NATURAL JOIN rdi_user AS u WHERE p.game_id=:game_id AND p.character_id=:character_id) AS up ON (c.character_id = up.character_id) WHERE c.character_id=:character_id');

    for ($count = 0; $count < $player_count; $count++):
    ?>
    <li><?php
        // get the random character
        $character_id = $characters[$rand_keys[$count]];

        // parse out the 'character_' part of the character id
        $character_id = intval(str_replace("character_","", $character_id));

        // run the query
        $statement->execute(array(':game_id' => $game_id, ':character_id' => $character_id));
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
            echo $row['character'];
        ?>
         -
        <?php
            echo $row['player'];
            endwhile;
        ?>
    </li>
    <?php
    endfor;
    ?>
</ul>
