<?php
//start the session
session_start();

// get the input data
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$blueQty = cleanInputs($_POST["blueQty"]);
	$pinkQty = cleanInputs($_POST["pinkQty"]);
	
	// Create an Array of items
	$items = array();

	// add items to the array if they were submitted via post
	if($blueQty>0) {
		$items["blueQty"] = $blueQty; 
	}

	if($pinkQty>0) {
		$items["pinkQty"] = $pinkQty; 
	}

	// set the session variable
	$_SESSION["tools"] = $items;
}

// a function to clean the data
function cleanInputs($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php print_r($_SESSION); ?>
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
    <script src="shopping.js"></script>

    <!-- Page title -->
    <title>Tools</title>
</head>
<body>
    <h1 class="pagetitle container"><a href="browse.php">Coffins and More</a></h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>The Tools Catalog</h2>
		<form id="tools" action="tools.php" method="post">
			<div class="row">
				<div class="col-sm mx-auto">
					<img src="http://woodworking-kids.com/content/2010/09/51EGTV0Xb2L._SL500_AA300_1.jpg" style="width:300px; height:300px;" alt="Deluxe Children's Toolset - Blue">
				</div>
				<div class="col-md">
					<p>Do you have a young one ready to create? This deluxe blue children's toolset is perfect for teaching your son how to work with his hands.</p>
					<label for="blueQty">Qty </label><input type="number" class="cartQty" id="blueQty" name="blueQty" min="0" placeholder="0"
						<?php echo "value='$blueQty'";?>
					> at $40 each<br/>
					<input type="submit" role="button" id="blueSubmit" name="blueSubmit" class="btnAddCart" value="Add to Cart">
				</div>
			</div>
			<div class="row">
				<div class="col-sm mx-auto">
					<img src="https://grkids.com/wp-content/uploads/2013/06/grip-pink-set.jpg" style="width:300px; height:300px;" alt="Deluxe Children's Toolset - Pink">
				</div>
				<div class="col-md">
					<p>Do you have an avid young engineer to be in your household? This deluxe pink children's toolset is perfect for teaching your daughter the tricks of the trade.</p>
					<label for="pinkQty">Qty</label><input type="number" class="cartQty" id="pinkQty" name="pinkQty" min="0" placeholder="0"
						<?php echo "value='$pinkQty'";?>
					> at $40 each<br/>
					<input type="submit" role="button" id="pinkSubmit" name="pinkSubmit" class="btnAddCart" value="Add to Cart">
				</div>
			</div>
		</form>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>