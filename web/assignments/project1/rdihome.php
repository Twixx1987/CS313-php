<?php 
//start the session
session_start();

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
    <title>RDI Home</title>
</head>
<body>
	<h1 class="pagetitle container">Welcome <?php echo $_SESSION['username'];?>!</h1>
	<div class="menu container">
		<?php include 'rdimenu.php'; ?>
	</div>
	<div class="container">
		<h2 class="container">A Brief Synopsis of the Red Dragon Inn</h2>
		<p>You and your adventuring companions have spent all day slogging through the Dungeon, killing monsters and taking 
		their stuff. Now you’re back in town, healed up, cleaned up, and ready to party at the Red Dragon Inn.</p>
		<p>Drink, gamble, and roughhouse with your friends. But don’t forget to keep an eye on your Gold. If you run out, 
		you’ll have to spend the night in the stables. Oh… and try not to get too beaten up or too drunk. If you black out, 
		your friends will continue the party without you… after they loot your body for Gold of course!</p>
		<p>The last conscious adventurer with Gold wins the game!</p>
		<p>This description is courtesy of SlugFest Games.</p>
	</div>
	<div class="container">
		<h2 class="container">The Heroes of the Red Dragon Inn</h2>
		<table>
			<tr><th>Version</th><th>Hero</th><th>Race</th><th>Class</th><th>Details</th></tr>
			<?php 
				// query the database for the username and password
				$statement = $db->query('SELECT v.version_name, c.character_name, c.race, c.class, c.good, c.bad, c.worse FROM rdi_characters as c JOIN rdi_version as v ON (v.version_id = c.version_id)  WHERE c.worse IS NULL OR v.version_id = 3');
				while ($row = $statement->fetch(PDO::FETCH_ASSOC))
				{
					echo '<tr><td>' . $row['rdi_version.version_name'] . '</td>';
					echo '<td>' . $row['rdi_characters.character_name'] . '</td>';
					echo '<td>' . $row['rdi_characters.race'] . '</td>';
					echo '<td>'. $row['rdi_characters.class'] . '</td>';
					echo '<td><strong>The Good:</strong>'. $row['rdi_characters.good'] . '<br/><strong>The Bad:</strong>'. $row['rdi_characters.bad'];
					if($row['rdi_characters.worse'] != "") {
						echo '<br/><strong>The Worse:</strong>'. $row['rdi_characters.worse']; 
					} 
					echo '</td></tr>';
				}
			?>
		</table>
		<h2 class="container">The Villains of the Black Dragon Depths</h2>
		<table>
			<tr><th>Version</th><th>Villain</th><th>Race</th><th>Class</th><th>Details</th></tr>
			<?php
				// query the database for the username and password
				$statement = $db->query('SELECT v.version_name, c.character_name, c.race, c.class, c.good, c.bad, c.worse FROM rdi_characters as c JOIN rdi_version as v ON (v.version_id = c.version_id) WHERE c.good IS NULL');
				while ($row = $statement->fetch(PDO::FETCH_ASSOC))
				{
					echo '<tr><td>' . $row['rdi_version.version_name'] . '</td>';
					echo '<td>' . $row['rdi_characters.character_name'] . '</td>';
					echo '<td>' . $row['rdi_characters.race'] . '</td>';
					echo '<td>'. $row['rdi_characters.class'] . '</td>';
					echo '<td><strong>The Bad:</strong>'. $row['rdi_characters.bad'] . '<br/><strong>The Worse:</strong>'. $row['rdi_characters.worse'] . '</td></tr>';
				}
			?>
		</table>
	</div>
</body>
</html>