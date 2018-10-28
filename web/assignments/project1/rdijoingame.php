<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // get the data from the request
    $game_id = intval($_POST["gameId"]);

    // create the prepared query to find the game_id
    $statement = $db->prepare('SELECT g.game_id, g.game_open, g.player_count, COUNT(p.game_id) AS joined_count FROM rdi_game AS g JOIN rdi_player as p ON (p.game_id=g.game_id) WHERE g.game_id=:game_id GROUP BY g.game_id');
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
            $dbDelete->bindParam(":game_id", $game_id);
            $dbDelete->bindParam(":character_id", $character_id);
            $dbDelete->execute();

            // output a joined game message
            ?>
            <p class="container">SUCCESS: You have joined Game #<?php echo $game_id; ?></p>
            <p class="container">You will be playing:
                <?php
                    // create the prepared query to find the character name
                    $statement3 = $db->prepare('SELECT character_name, race, class FROM rdi_characters WHERE character_id=:character_id');

                    // run the query
                    $statement3->execute(array(':character_id' => $character_id));
                    while ($row3 = $statement3->fetch(PDO::FETCH_ASSOC)){
                        echo $row3['character_name'];
                    }
                ?>
            </p>
            <?php
        } else {
            // output an error message
            ?>
            <p class="container error">ERROR: Invalid Game ID <?php echo $game_id; ?></p>
            <?php
        }
    }
?>