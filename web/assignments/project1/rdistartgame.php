<?php
// include the DB connection
require 'rdidbconnect.php';

// include the logged in verification
require 'rdiverifylogin.php';

// get the data from the request
$player_count = intval($_POST["playerCount"]);

// check for character settings
if (isset($_SESSION["characters"])) {
    // create the prepared query to create the game_id
    $insertQuery = "INSERT INTO rdi_game (player_count, host_user) 
                    VALUES (:player_count, :host_user)";
    $dbInsert = $db->prepare($insertQuery);
    $dbInsert->execute(array(':player_count' => $player_count, ':host_user' => $user_id));

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
        $insertQuery2 = "INSERT INTO rdi_game_characters (game_id, character_id) 
                         VALUES (:game_id, :character_id)";
        $dbInsert2 = $db->prepare($insertQuery2);
        $dbInsert2->execute(array(':game_id' => $game_id, ':character_id' => $character_id));
    }

    // get the first character from the array
    $character_id = $characters[$rand_keys[0]];

    // parse out the 'character_' part of the character id
    $character_id = intval(str_replace("character_","", $character_id));

    // insert creator into the game
    $insertQuery3 = "INSERT INTO rdi_player (game_id, user_id, character_id) 
                     VALUES (:game_id, :user_id, :character_id)";
    $dbInsert3 = $db->prepare($insertQuery3);
    $dbInsert3->execute(array(':game_id' => $game_id, ':user_id' => $user_id, ':character_id' => $character_id));

    // output a joined game message
    ?>
    <p class="container">SUCCESS: You have created Game #<span id="game_id"><?php echo $game_id; ?></span></p>
    <p class="container">The following players have joined your game:</p>
    <div id="playerList" class="container">
        <ul>
            <?php
            // create the prepared query to find the character name
            $query = "SELECT u.user_name AS player 
                      FROM rdi_user AS u 
                      NATURAL JOIN rdi_player AS p 
                      WHERE p.game_id=:game_id";
            $statement = $db->prepare($query);

            // run the query
            $statement->execute(array(':game_id' => $game_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                ?>
                <li><?php echo $row['player']; ?></li>
            <?php
            endwhile;
            ?>
        </ul>
    </div>
    <button class="btn btn-secondary button" id="refreshPlayersList" name="refreshPlayersList" onclick="">
        Refresh Players List</button>
    <button class="btn btn-secondary button" id="closeGame" name="closeGame"
            onclick="closeGame(<?php echo $game_id; ?>)">Generate Characters</button>
<?php
} else {
?>
    <h3 class="error">ERROR: There was an error creating your game,
        please ensure that character selection has been set.</h3>
<?php
}
?>