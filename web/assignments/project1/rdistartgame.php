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

        echo "<br/>Session characters:<br/>";
        var_dump($characters);
        echo "<br/>random keys:<br/>";
        var_dump($rand_keys);
        echo "<br/>character_id:<br/>";
        var_dump($character_id);

        // parse out the 'character_' part of the character id
        $character_id = intval(str_replace("character_","", $character_id));

        echo "<br/>Character_id Integer:<br/>";
        var_dump($character_id);

        // create the prepared query to add the game characters
        $dbInsert2 = $db->prepare('INSERT INTO rdi_game_characters (game_id, character_id) VALUES (:game_id, :character_id)');
        $dbInsert2->execute(array(':game_id' => $game_id, ':character_id' => $character_id));
    }

    // get the first character from the array
    $character_id = $characters[$rand_keys[0]];

    echo "<br/>character_id:<br/>";
    var_dump($character_id);

    // parse out the 'character_' part of the character id
    $character_id = intval(str_replace("character_","", $character_id));

    echo "<br/>Character_id Integer:<br/>";
    var_dump($character_id);

    // insert creator into the game
    $dbInsert3 = $db->prepare('INSERT INTO rdi_player (game_id, user_id, character_id) VALUES (:game_id, :user_id, :character_id)');
    $dbInsert3->execute(array(':game_id' => $game_id, ':user_id' => $user_id, ':character_id' => $character_id));

    // remove that character from the game_characters table
//    $dbDelete = $db->prepare('DELETE FROM rdi_game_characters WHERE game_id=:game_id AND character_id=:character_id)');
//    $dbDelete->execute(array(':game_id' => $game_id, ':character_id' => $character_id));

// output a joined game message
?>
<p class="container">SUCCESS: You have created Game #<?php echo $game_id; ?></p>
