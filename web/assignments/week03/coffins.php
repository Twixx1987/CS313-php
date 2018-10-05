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
    <title>Catalog</title>
</head>
<body>
    <h1 class="pagetitle container">The Coffins Catalog</h1>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
	<div class="container">
		<h2>The Coffins Catalog</h2>
		<div class="row">
			<div class="col-sm">
				<img href="http://www.goodfuneralguide.co.uk/wp-content/uploads/2013/01/Honest-Coffin.jpg" style="width:802px; height:600px;" alt="Deluxe Pine Coffin">
			</div>
			<div class="col-md">
				<p>A simple yet rustic coffin for a reasonable price. This is made of solid pine planks giving it that beautiful rustic look.</p>
				<form id="pineCoffin" action="" method="post">
					<label for="pineQty">Qty</label><input type="number" class="cartQty" id="pineQty" name="pineQty" placeholder="0"> at $1,500 each<br/>
					<input type="submit" id="pineSubmit" name="pineSubmit" class="btnAddCart" value="Add to Cart">
				</form>
			</div>
		</div>
	</div>
</body>
</html>