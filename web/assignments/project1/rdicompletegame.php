<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';
?>
<p class="container">Game #<?php echo $game_id; ?> is complete.</p>
<p class="container">Here is how everyone ranked:</p>
<ul>
    <?php
    // create the prepared query to find the character name
    $statement = $db->prepare('SELECT c.character_name AS character, up.user_name AS player, up.placement AS placement FROM rdi_characters AS c LEFT JOIN (SELECT p.character_id, u.user_name, p.placement FROM rdi_player AS p NATURAL JOIN rdi_user AS u WHERE p.game_id=:game_id AND p.character_id=:character_id) AS up ON (c.character_id = up.character_id) WHERE c.character_id=:character_id');

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
