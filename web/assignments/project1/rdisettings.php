<?php
    //start the session
    session_start();

    // create an array variable to add all checked characters to the session variables
    $characters = array();

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
    <script src="rdi.js"></script>

    <!-- Page title -->
    <title>RDI Settings</title>
</head>
<body>
	<h1 class="pagetitle container">RDI Settings</h1>
	<div class="menu container">
		<?php include 'rdimenu.php'; ?>
	</div>
	<div class="container">
		<form name="settings" action="rdisettings.php" method="post">
            <button id="selectAll" name="selectAll" onclick="">Select All</button>
            <input type="submit" value="Update Settings" id="allUpdate">
			<h2 class="container">Box Sets</h2>
			<table class="versions">
				<?php
					// query the database for the list of versions
					$statement = $db->query('SELECT version_name as version FROM rdi_version  ORDER BY version_name');
					while ($row = $statement->fetch(PDO::FETCH_ASSOC))
					{
						echo '<tr class="' . $row['version'] . '"><td><label for="' . $row['version'] . '">' . $row['version'] . '</label></td>';
						echo '<td><input type="checkbox" id="' . $row['version'] . '" name="' . $row['version'] . '" value="' . $row['version'] . '"></td></tr>';
					}
				?>
			</table>
            <input type="submit" value="Update Settings" id="boxUpdate">
			<h2 class="container">Individual Characters</h2>
			<table class="characters">
				<?php
					// query the database for the list of characters
					$statement = $db->query('SELECT v.version_name as version, c.character_name as character, c.character_id as character_id, c.race as race, c.class as class, c.good as good, c.bad as bad, c.worse as worse FROM rdi_characters as c JOIN rdi_version as v ON (v.version_id = c.version_id) ORDER BY v.version_name, c.character_name');
					while ($row = $statement->fetch(PDO::FETCH_ASSOC))
					{
						echo '<tr class="' . $row['version'] . ' ' . $row['character'] . '"><td><label for="character_' . $row['character_id'] . '">' . $row['version'] . '</label></td>';
						echo '<td><label for="character_' . $row['character_id'] . '">' . $row['character'] . '</label></td>';
						echo '<td><label for="character_' . $row['character_id'] . '">' . $row['race'] . '</label></td>';
						echo '<td><label for="character_' . $row['character_id'] . '">'. $row['class'] . '</label></td>';
						echo '<td><label for="character_' . $row['character_id'] . '">';
						if($row['good'] != "") {
							echo '<strong>The Good:</strong>'. $row['good'] . '<br/>';
						}
						echo '<strong>The Bad:</strong>'. $row['bad'];
						if($row['worse'] != "") {
							echo '<br/><strong>The Worse:</strong>'. $row['worse']; 
						} 
						echo '</label></td>';
						echo '<td><input type="checkbox" id="character_' . $row['character_id'] . '" name="character_' . $row['character_id'] . '" value="' . $row['character'] . '"';
						if ($_POST["character_" . $row['character_id']] == $row['character']) {
                            $characters["character_" . $row['character_id']] = $row['character'];
						    echo 'checked';
                        }
                        echo '></td></tr>';
					}

					// add the array of characters to the session variables
					$_SESSION['characters'] = $characters;
				?>
			</table>
            <input type="submit" value="Update Settings" id="characterUpdate">
		</form>
	</div>
</body>
</html>