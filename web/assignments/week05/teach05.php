<?php
// include the DB access
include "teach05dbaccess.php";

// set variables for the inputs
$book = "";

// get the input data
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$book = cleanInputs($_POST["book"]);
}

// a function to clean the data
function cleanInputs($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strtolower($data);
	$data = ucwords($data);
	return $data;
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
    <link rel="stylesheet" href="../../homepage.css" />
    
    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../assignments.js"></script>

    <!-- Page title -->
    <title>Scripture Resources</title>
</head>
<body>
	<h1 class="pagetitle container">Scripture Resources</h1>
	<div class="menu container">
		<?php include '../../top_menu.php'; ?>
	</div>
	<div class="container">
		<form id="search" name="search" method="post" action="teach05.php">
			<label for="book">Enter the name of a book to search for content from it.</label><br />
			<input type="text" name="book" id="book" placeholder="Book" <?php if ($_SERVER["REQUEST_METHOD"]=="POST") echo 'value="' . $book .'"';?>><br/>
			<input type="submit" value="Submit" name="submit"  class="btn btn-secondary">
		</form>
		<h2 class="container">Results</h2>
		<?php
			$statement = $db->prepare('SELECT book, chapter, verse, id FROM scriptures WHERE book=:book');
			$statement->execute(array(':book' => $book));
			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				echo '<a href="teach05details.php?id=' . $row['id'] . '"><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong></a><br/>'; 
			}
		?>
	</div>
</body>
</html>
