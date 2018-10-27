<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // get the data from the request
    $game_id = $_POST["gameId"];

    // create the prepared query to find the game_id
    $statement = $db->prepare('SELECT rdi_game.game_id, game_open, player_count, COUNT(rdi_player.game_id) AS joined_count FROM rdi_game JOIN rdi_player ON (rdi_player.game_id=rdi_game.game_id) WHERE rdi_game.game_id=:game_id GROUP BY rdi_game.game_id LIMIT 1');
    $statement->execute(array(':game_id' => $game_id));
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        // is the game ID is valid
        if ($row["game_id"] == $game_id && $row["game_open"] && $row["player_count"] > $row["joined_count"]) {
            // get a character from the game_character table
            $statement2 = $db->prepare('SELECT character_id FROM rdi_game_characters WHERE game_id=:game_id LIMIT 1');
            $statement2->execute(array(':game_id' => $game_id));
            while ($row2 = $statement2->fetch(PDO::FETCH_ASSOC)) {
                $character_id = $row2["character_id"];
            }

            // insert the player into the game
            $dbInsert = $db->prepare('INSERT INTO rdi_player (game_id, user_id, character_id) VALUES (:game_id, :user_id, :character_id)');
            $dbInsert->execute(array(':game_id' => $game_id, ':user_id' => $user_id, ':character_id' => $character_id));

            // remove that character from the game_characters table
            $dbDelete = $db->prepare('DELETE FROM rdi_game_characters WHERE game_id=:game_id AND character_id=:character_id)');
            $dbDelete->execute(array(':game_id' => $game_id, ':character_id' => $character_id));

            // output a joined game message
            ?>
            <p class="container">SUCCESS: You have joined Game #<?php echo $game_id; ?></p>
            <?php
        } else {
            // output an error message
            ?>
            <p class="container error">ERROR: Invalid Game ID <?php echo $game_id; ?></p>
            <?php
        }
    }
?>