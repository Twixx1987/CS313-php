<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS and Custom Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../homepage.css" />
    
    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assignments.js"></script>

    <!-- Page title -->
    <title>CS313 - Teach 03 - Shaun Densley</title>
</head>
<body>
    <h1 class="pagetitle container">CS313 - Teach 03 - Shaun Densley</h1>
	<div class="menu container">
		<?php include '../../top_menu.php'; ?>
	</div>
	<div id="form" class="container">
		<form action="teach03form.php" method="post">
			<p>Here is a simpole questionnaire about your major and travel history. Please answer all the questions.</p>
			<label for="name">Name </label><input type="text" id="name" name="name"><br/>
			<label for="email">Email </label><input type="text" id="email" name="email"><br/>
			<label for="major">Major</label><br/>
			<ul>
				<?php
					$majors = array("CS" => "Computer Science", "WDD" => "Web Design and Development", "CIT" => "Computer Information Technology", "CE" => "Computer Engineering");
					foreach($majors as $abr => $major) {
						echo "<input type=\"radio\" name=\"major\" id=\"major-\"" . $abr . " value=\"$major\"><label for=\"major-\"" . $abr . ">$major</label><br/>";
					}
				?>
			</ul>
			<label for="comments">Comments</label><br/>
			<textarea name="comments" rows="5" cols="40" placeholder="Comments"></textarea><br/>
			Select all the continents you have visited:<br/>
			<ul>
				<?php
					$continents = array("NA" => "North America", "SA" => "South America", "EU" => "Europe", "AS" => "Asia", "AU" => "Australia", "AF" => "Africa", "AN" => "Antartica");
					foreach($continents as $abr => $continent) {
						echo "<li class=\"noStyle\"><input type=\"checkbox\" name=\"continents[]\" id=\"continent-\"" . $abr . " value=\"$abr\"><label for=\"continent-\"" . $abr . ">$continent</label></li>";
					}
				?>
			</ul>
				
			<input class="btn btn-secondary" type="submit" value="Submit" name="submit">
		</form>
	</div>
</body>
</html>