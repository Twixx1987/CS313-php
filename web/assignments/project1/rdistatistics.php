<?php
    //start the session
    session_start();

    // get the user_id and username session variables
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    // include the DB connection
    include 'rdidbconnect.php';
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
    <script src="../assignments.js"></script>

    <!-- Page title -->
    <title>RDI Statistics</title>
</head>
<body>
	<h1 class="pagetitle container">RDI Statistics</h1>
	<div class="menu container">
		<?php include 'rdimenu.php'; ?>
	</div>
	<div class="container">
        <h2 class="container"><?php echo $_SESSION['username']; ?>'s Statistics</h2>
        <p>
            You have played
            <?php
            // query the database for the list of versions
            $statement = $db->prepare('SELECT count(*) as game_count FROM rdi_player WHERE user_id=:user_id');
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
            // query the database for the list of versions
            $statement = $db->prepare('SELECT count(*) as game_count FROM rdi_player WHERE user_id=:user_id AND placement=1');
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
                // query the database for the list of versions
                $statement = $db->prepare('SELECT MAX(char.char_count) AS char_count, char.character AS character FROM (SELECT rdi_characters.character_name AS character, COUNT(rdi_player.character_id) AS char_count FROM rdi_player JOIN rdi_characters ON (rdi_player.character_id=rdi_characters.character_id) WHERE user_id=:user_id GROUP BY rdi_characters.character_name) as char GROUP BY character ORDER BY char_count DESC');
                $statement->execute(array(':user_id' => $user_id));
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<tr><td>' . $row['character'] . '</td>';
                    echo '<td>' . $row['char_count'] . '</td></tr>';
                }
                ?>
            </table>
        ;
	</div>
</body>
</html>