<?php
    // include the DB connection
    require 'rdidbconnect.php';

    // include the logged in verification
    require 'rdiverifylogin.php';

    // set a characters array to the session contents if any
    if (isset($_SESSION['characters'])) {
        $characters = $_SESSION['characters'];
    }

    // if the user has submitted, populate the character settings array
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // create an array variable to add all checked characters to the session variables
        $characters = array();

        // loop through the POST array adding each character to the character array
        foreach ($_POST as $value) {
            // check to see if the item is a character
            if (strpos($value, "character_") === 0) {
                // the value is a character, append it to the characters array
                array_push($characters, $value);
            }
        }

        // add the characters array to the session
        $_SESSION["characters"] = $characters;
    }
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
    <title>RDI-Tracker Settings</title>
</head>
<body>
    <div class="container fixed-top bg-white">
        <h1 class="pagetitle">RDI-Tracker Settings</h1>
        <div class="menu container bg-secondary">
            <?php include 'rdimenu.php'; ?>
        </div>
    </div>
    <div class="container body">
        <button id="selectAll" name="selectAll" class="btn btn-secondary">Select All</button>
        <button id="clearAll" name="clearAll" class="btn btn-secondary">Clear All</button>
		<form name="settings" action="rdisettings.php" method="post">
            <input type="submit" value="Update Settings" id="allUpdate" class="btn btn-secondary">
			<h2 class="container">Box Sets</h2>
			<table class="versions">
				<?php
                    // create a counter variable
                    $count = 1;

					// query the database for the list of versions
					$statement = $db->query('SELECT version_name as version, version_id FROM rdi_version  ORDER BY version_name');
					while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                        // increase count
                        $count++;

					    // every third cell start a new row
					    if ($count % 4 == 0):
				?>
                <tr>
                <?php endif; ?>
                    <td class="version_<?php echo $row['version_id']; ?>"><?php echo $row['version']; ?>
                        <input type="checkbox" class="versionSelector version_<?php echo $row['version_id']; ?>" id="version_<?php echo $row['version_id']; ?>"
                                   name="version_<?php echo $row['version_id']; ?>" value="version_<?php echo $row['version_id']; ?>">
                    </td>
                <?php if ($count % 3 == 0): ?>
                </tr>
                <?php endif; ?>
				<?php endwhile; ?>
			</table>
            <input type="submit" value="Update Settings" id="boxUpdate" class="btn btn-secondary">
			<h2 class="container">Individual Characters</h2>
			<table class="characters">
				<?php
					// query the database for the list of characters
					$statement = $db->query('SELECT v.version_name as version, v.version_id as version_id, c.character_name as character, c.character_id as character_id, c.race as race, c.class as class, c.good as good, c.bad as bad, c.worse as worse FROM rdi_characters as c JOIN rdi_version as v ON (v.version_id = c.version_id) ORDER BY v.version_name, c.character_name');
					while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
                ?>
				<tr class="version_<?php echo $row['version_id']; ?> character character_<?php echo $row['character_id']; ?>">
                    <td class="character_<?php echo $row['character_id']; ?>"><?php echo $row['version']; ?></td>
					<td class="character_<?php echo $row['character_id']; ?>"><?php echo $row['character']; ?></td>
					<td class="character_<?php echo $row['character_id']; ?>"><?php echo $row['race']; ?></td>
					<td class="character_<?php echo $row['character_id']; ?>"><?php echo $row['class']; ?></td>
					<td class="character_<?php echo $row['character_id']; ?>">
					    <?php if($row['good'] != ""): ?>
                            <strong>The Good:</strong><?php echo $row['good']; ?><br/>
                        <?php endif; ?>
    					<strong>The Bad:</strong><?php echo $row['bad']; ?>
                        <?php if($row['worse'] != ""): ?>
		    				<br/><strong>The Worse:</strong><?php echo $row['worse']; ?>
                        <?php endif; ?>
                        <input type="checkbox" class="version_<?php echo $row['version_id']; ?> character_<?php echo $row['character_id']; ?>"
                                id="character_<?php echo $row['character_id']; ?>" name="character_<?php echo $row['character_id']; ?>" value="character_<?php echo $row['character_id']; ?>"
                                <?php
                                    if (in_array("character_" . $row['character_id'], $characters)) {
                                        // check the current row
						                echo 'checked="checked"';
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
            <input type="submit" value="Update Settings" id="characterUpdate" class="btn btn-secondary">
		</form>
	</div>
    <br />
    <div class="footer text-sm-center container bg-secondary text-white">
        <?php include 'rdirightsfooter.php'; ?>
    </div>
</body>
</html>