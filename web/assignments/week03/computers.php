<?php
//start the session
session_start();
?>

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
    <script src="shopping.js"></script>

    <!-- Page title -->
    <title>Computers</title>
</head>
<body>
	<?php
		$_SESSION["items[]"];
	?>

    <h1 class="pagetitle container"><a href="browse.php">Coffins and More</a></h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>The Computers Catalog</h2>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://www.device.pl/content/images/thumbs/0002415_dell-optiplex-380-pentium-dc.jpeg" style="width:300px; height:300px;" alt="Industrial Dell Computer">
			</div>
			<div class="col-md">
				<p>This industrial strength Dell computer is perfect for all but the heavy users. Just add a monitor, mouse, and keyboard and you will be set.</p>
				<form id="dellComp" action="computers.php" method="post">
					<label for="dellQty">Qty</label><input type="number" class="cartQty" id="dellQty" name="dellQty" min="0" placeholder="0"> at $500 each<br/>
					<input type="submit" id="dellSubmit" name="dellSubmit" class="btnAddCart" value="Add to Cart">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="https://thumbs.dreamstime.com/b/old-computer-6729508.jpg" style="width:224px; height:300px;" alt="Deluxe Computer">
			</div>
			<div class="col-md">
				<p>Though this computer appears to be from a bygone age, it is truly a powerhouse. The casing is just a facade to help protect your assets.</p>
				<form id="powerComp" action="computers.php" method="post">
					<label for="compQty">Qty</label><input type="number" class="cartQty" id="compQty" name="compQty" min="0" placeholder="0"> at $1,500 each<br/>
					<input type="submit" id="compSubmit" name="compSubmit" class="btnAddCart" value="Add to Cart">
				</form>
			</div>
		</div>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>