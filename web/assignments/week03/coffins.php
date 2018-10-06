<?php
//start the session
session_start();

// create/call the items session variable
$_SESSION["items"];

// get the input data
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$pineQty = cleanInputs($_POST["pineQty"]);
	$mahoganyQty = cleanInputs($_POST["mahoganyQty"]);
	$cedarQty = cleanInputs($_POST["cedarQty"]);
	$beachQty = cleanInputs($_POST["beachQty"]);

	// Create an Array of the items added to the cart
	$items[] = ("pineQty" => $pineQty, "mahoganyQty" => $mahoganyQty, "cedarQty" => $cedarQty, "beachQty" =>$beachQty);

	// get the session array
	$sessionItem = $_SESSION["items"];

	// merge new array with the session array
	array_merge($sessionItems, $items);
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
<?php echo "<div>$_SESSION['items']</div>"; ?>
    <h1 class="pagetitle container"><a href="browse.php">Coffins and More</a></h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>The Coffins Catalog</h2>
		<div class="row">
			<form id="coffins" action="coffins.php" method="post">
				<div class="col-sm mx-auto">
					<img src="http://www.goodfuneralguide.co.uk/wp-content/uploads/2013/01/Honest-Coffin.jpg" style="width:401px; height:300px;" alt="Deluxe Pine Coffin">
				</div>
				<div class="col-md">
					<p>A simple yet rustic coffin for a reasonable price. This is made of solid pine planks giving it that beautiful rustic look.</p>
					<label for="pineQty">Qty</label><input type="number" class="cartQty" id="pineQty" name="pineQty" min="0" placeholder="0" 
						<?php echo "value='$pineQty'";?>
					> at $1,500 each<br/>
					<input type="submit" id="pineSubmit" name="pineSubmit" class="btnAddCart" value="Add to Cart">
				</div>
			</div>
			<div class="row">
				<div class="col-sm mx-auto">
					<img src="https://static.turbosquid.com/Preview/2014/07/11__22_47_27/Coffin2_2.jpgb9394da4-5103-4409-9c3b-07fbc28eeaf1Original.jpg" style="width:300px; height:300px;" alt="Deluxe Mahogany Coffin">
				</div>
				<div class="col-md">
					<p>A beautiful dark Mahogany coffin that goes with anything. The smooth finish is always a pleaser.</p>
					<label for="mahoganyQty">Qty</label><input type="number" class="cartQty" id="mahoganyQty" name="mahoganyQty" min="0" placeholder="0"
						<?php echo "value='$mahoganyQty'";?>
					> at $2,500 each<br/>
					<input type="submit" id="mahoganySubmit" name="mahoganySubmit" class="btnAddCart" value="Add to Cart">
				</div>
			</div>
			<div class="row">
				<div class="col-sm mx-auto">
					<img src="http://newhavenfunerals.com.au/wp-content/uploads/2014/05/ASHURST-CEDAR.jpg" style="width:425px; height:300px;" alt="Deluxe Cedar Coffin">
				</div>
				<div class="col-md">
					<p>This deluxe Cedar coffin is perfect for everyone. The hand carved finish work makes it one of our most beautiful products.</p>
					<label for="cedarQty">Qty </label><input type="number" class="cartQty" id="cedarQty" name="cedarQty" min="0" placeholder="0"
						<?php echo "value='$cedarQty'";?>
					> at $3,500 each<br/>
					<input type="submit" id="cedarSubmit" name="cedarSubmit" class="btnAddCart" value="Add to Cart">
				</div>
			</div>
			<div class="row">
				<div class="col-sm mx-auto">
					<img src="https://i0.wp.com/newhavenfunerals.com.au/wp-content/uploads/2014/05/BEACH-FISHING.jpg" style="width:449px; height:300px;" alt="Deluxe Beach Coffin">
				</div>
				<div class="col-md">
					<p>The beautiful hand painted beach finish on this coffin is sure to lighten the mood. This is especially popular among those who love aquatics.</p>
					<label for="beachQty">Qty</label><input type="number" class="cartQty" id="beachQty" name="beachQty" min="0" placeholder="0"
						<?php echo "value='$beachQty'";?>
					> at $4,500 each<br/>
					<input type="submit" id="beachSubmit" name="beachSubmit" class="btnAddCart" value="Add to Cart">
				</div>
			</form>
		</div>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>