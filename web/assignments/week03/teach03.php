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
		<?php include '../top_menu.php'; ?>
	</div>
	<div class="container">
		<form action="teach03form.php" method="post">
			Name: <input type="text" name="name"><br/>
			Email: <input type="text" name="email"><br/>
			Major:<br/><input type="radio" name="major" value="Computer Science">Computer Science<br/>
					<input type="radio" name="major" value="Web Design and Development">Web Design and Development<br/>
					<input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br/>
					<input type="radio" name="major" value="Computer Engineering">Computer Engineering<br/>
			Comments: <textarea name="comments" rows="5" cols="40"><br/>
			Continents Visited: <br/>
			<input class="btn btn-secondary" type="submit" value="Submit" name="submit">
		</form>
	</div>
</body>
</html>