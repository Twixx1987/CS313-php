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
        <button id="selectAll" name="selectAll">Select All</button>
		<form name="settings" action="rdisettings.php" method="post">
            <input type="submit" value="Update Settings" id="allUpdate">
			<h2 class="container">Box Sets</h2>
			<table class="versions">
				<?php
					// query the database for the list of versions
					$statement = $db->query('SELECT version_name as version, version_id FROM rdi_version  ORDER BY version_name');
					while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
				?>
						<tr class="version_<?php echo $row['version_id']; ?>">
                            <td><label for="version_<?php echo $row['version_id']; ?>"><?php echo $row['version']; ?></label></td>
						    <td><input type="checkbox" class="versionSelector version_<?php echo $row['version_id']; ?>" id="version_<?php echo $row['version_id']; ?>"
                                       name="version_<?php echo $row['version_id']; ?>" value="version_<?php echo $row['version_id']; ?>"></td>
                        </tr>
				<?php endwhile; ?>
			</table>
            <input type="submit" value="Update Settings" id="boxUpdate">
			<h2 class="container">Individual Characters</h2>
			<table class="characters">
				<?php
					// query the database for the list of characters
					$statement = $db->query('SELECT v.version_name as version, v.version_id as version_id, c.character_name as character, c.character_id as character_id, c.race as race, c.class as class, c.good as good, c.bad as bad, c.worse as worse FROM rdi_characters as c JOIN rdi_version as v ON (v.version_id = c.version_id) ORDER BY v.version_name, c.character_name');
					while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                ?>
				<tr class="version_<?php echo $row['version_id']; ?> character_<?php echo $row['character_id']; ?>">
                    <td><label for="character_<?php echo $row['character_id']; ?>"><?php echo $row['version']; ?></label></td>
					<td><label for="character_<?php echo $row['character_id']; ?>"><?php echo $row['character']; ?></label></td>
					<td><label for="character_<?php echo $row['character_id']; ?>"><?php echo $row['race']; ?></label></td>
					<td><label for="character_<?php echo $row['character_id']; ?>"><?php echo $row['class']; ?></label></td>
					<td><label for="character_<?php echo $row['character_id']; ?>">
					    <?php if($row['good'] != ""): ?>
                            <strong>The Good:</strong><?php echo $row['good']; ?><br/>
                        <?php endif; ?>
    					<strong>The Bad:</strong><?php echo $row['bad']; ?>
                        <?php if($row['worse'] != ""): ?>
		    				<br/><strong>The Worse:</strong><?php echo $row['worse']; ?>
                        <?php endif; ?>
                        </label></td>
                    <td><input type="checkbox" class="version_<?php echo $row['version_id']; ?> character_<?php echo $row['character_id']; ?>"
                                id="character_<?php echo $row['character_id']; ?>" name="character_<?php echo $row['character_id']; ?>" value="character_<?php echo $row['character_id']; ?>"
                                <?php
                                    if ($_POST["character_" . $row['character_id']] == $row['character']) {
                                        // add the character to the array of characters
                                        $characters["character_" . $row['character_id']] = $row['character'];
						                echo 'checked';
                                    }
                                ?>
                    ></td>
                </tr>
                <?php
                    // end the while loop
                    endwhile;

					// add the array of characters to the session variables
					$_SESSION['characters'] = $characters;
				?>
			</table>
            <input type="submit" value="Update Settings" id="characterUpdate">
		</form>
	</div>
</body>
</html>