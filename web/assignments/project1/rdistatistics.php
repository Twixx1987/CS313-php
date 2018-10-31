<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';
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
    <title>RDI-Tracker Statistics</title>
</head>
<body>
	<h1 class="pagetitle container">RDI-Tracker Statistics</h1>
	<div class="menu container">
		<?php include 'rdimenu.php'; ?>
	</div>
	<div class="container">
        <h2 class="container"><?php echo $_SESSION['username']; ?>'s Statistics</h2>
        <p>
            You have played
            <?php
            // create the query statement
            $query  = 'SELECT count(p.player_id) as game_count FROM rdi_player AS p';
            $query .= ' NATURAL JOIN rdi_game AS g';
            $query .= ' WHERE p.user_id=:user_id AND g.game_complete=TRUE';

            // query the database for the list of versions
            $statement = $db->prepare($query);
            $statement->execute(array(':user_id' => $user_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                echo $row['game_count'];
            }
            ?>
            games.
        </p>
        <p>
            You have won
            <?php
            // update the query statement adding the placement callout
            $query .= ' AND placement=1';

            // query the database for the list of versions
            $statement = $db->prepare($query);
            $statement->execute(array(':user_id' => $user_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                echo $row['game_count'];
            }
            ?>
            games.
        </p>
        <h3>Your play frequency for each character is:</h3>
        <table>
            <tr>
                <th>Character Played</th>
                <th>Number of Games</th>
            </tr>
            <?php
            // create the query string
            $query2  = 'SELECT MAX(char.char_count) AS char_count, char.character AS character';
            $query2 .= ' FROM (SELECT c.character_name AS character, COUNT(gp.character_id) AS char_count';
            $query2 .= ' FROM (SELECT p.character_id AS character_id, p.user_id AS user_id FROM rdi_player AS p';
            $query2 .= ' JOIN rdi_game AS g ON (p.game_id=g.game_id) WHERE g.game_complete = TRUE) AS gp';
            $query2 .= ' JOIN rdi_characters AS c ON (gp.character_id=c.character_id) WHERE gp.user_id=:user_id';
            $query2 .= ' GROUP BY c.character_name) AS char GROUP BY character ORDER BY char_count DESC, character;';

            // query the database for the list of versions
            $statement = $db->prepare($query2);
            $statement->execute(array(':user_id' => $user_id));
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
            ?>
            <tr>
                <td><?php echo $row['character']; ?></td>
                <td><?php echo $row['char_count']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
	</div>
    <div class="footer text-sm-center container">
        <?php include 'rdirightsfooter.php'; ?>
    </div>
</body>
</html>