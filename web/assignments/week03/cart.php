<?php
//start the session
session_start();

// get the session variable values
$coffins = $_SESSION["coffins"];
$computers = $_SESSION["computers"];
$tools = $_SESSION["tools"];

// get the individual items
$pineQty = $coffins["pineQty"];
$mahoganyQty = $coffins["mahoganyQty"];
$cedarQty = $coffins["cedarQty"];
$beachQty = $coffins["beachQty"];
$dellQty = $computers["dellQty"];
$compQty = $computers["compQty"];
$blueQty = $tools["blueQty"];
$pinkQty = $tools["pinkQty"];

// get the input data
if($_SERVER["REQUEST_METHOD"]=="POST") {
	$pineQty = cleanInputs($_POST["pineQty"]);
	$mahoganyQty = cleanInputs($_POST["mahoganyQty"]);
	$cedarQty = cleanInputs($_POST["cedarQty"]);
	$beachQty = cleanInputs($_POST["beachQty"]);
	$dellQty = cleanInputs($_POST["dellQty"]);
	$compQty = cleanInputs($_POST["compQty"]);
	$blueQty = cleanInputs($_POST["blueQty"]);
	$pinkQty = cleanInputs($_POST["pinkQty"]);
	
	// Create the Arrays of items
	$coffins = array();
	$computers = array();
	$tools = array();

	// add items to the arrays if they were submitted via post
	if($pineQty>0) {
		$coffins["pineQty"] = $pineQty; 
	}

	if($mahoganyQty>0) {
		$coffins["mahoganyQty"] = $mahoganyQty; 
	}

	if($cedarQty>0) {
		$coffins["cedarQty"] = $cedarQty;
	}
	
	if($beachQty>0) {
		$coffins["beachQty"] = $beachQty;
	}
	
	if($dellQty>0) {
		$computers["dellQty"] = $dellQty; 
	}

	if($compQty>0) {
		$computers["compQty"] = $compQty; 
	}
	
	if($blueQty>0) {
		$tools["blueQty"] = $blueQty; 
	}

	if($pinkQty>0) {
		$tools["pinkQty"] = $pinkQty; 
	}

	// set the session variables
	$_SESSION["coffins"] = $coffins;
	$_SESSION["computers"] = $computers;
	$_SESSION["tools"] = $tools;
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
    <link rel="stylesheet" href="../../homepage.css" />
    
    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="shopping.js"></script>

    <!-- Page title -->
    <title>Shopping Cart</title>
</head>
<body>
    <h1 class="pagetitle container"><a href="browse.php">Coffins and More</a></h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>Cart</h2>
		<form id="cart" action="cart.php" method="post">
			<div class="row <?php if($pineQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="http://www.goodfuneralguide.co.uk/wp-content/uploads/2013/01/Honest-Coffin.jpg" style="width:200px; height:150px;" alt="Deluxe Pine Coffin">
				</div>
				<div class="col-md">
					<label for="pineQty">Qty</label><input type="number" class="cartQty" id="pineQty" name="pineQty" min="0" placeholder="0" 
						<?php echo "value='$pineQty'";?>
					> @ $1,500 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $pineQty*1500; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="pineSubmit" name="pineSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($mahoganyQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="https://static.turbosquid.com/Preview/2014/07/11__22_47_27/Coffin2_2.jpgb9394da4-5103-4409-9c3b-07fbc28eeaf1Original.jpg" style="width:150px; height:150px;" alt="Deluxe Mahogany Coffin">
				</div>
				<div class="col-md">
					<label for="mahoganyQty">Qty</label><input type="number" class="cartQty" id="mahoganyQty" name="mahoganyQty" min="0" placeholder="0" 
						<?php echo "value='$mahoganyQty'";?>
					> @ $2,500 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $mahoganyQty*2500; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="mahoganySubmit" name="mahoganySubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($cedarQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="http://newhavenfunerals.com.au/wp-content/uploads/2014/05/ASHURST-CEDAR.jpg" style="width:213px; height:150px;" alt="Deluxe Cedar Coffin">
				</div>
				<div class="col-md">
					<label for="cedarQty">Qty</label><input type="number" class="cartQty" id="cedarQty" name="cedarQty" min="0" placeholder="0" 
						<?php echo "value='$cedarQty'";?>
					> @ $3,500 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $cedarQty*3500; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="cedarSubmit" name="cedarSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($beachQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img class="mx-auto" src="https://i0.wp.com/newhavenfunerals.com.au/wp-content/uploads/2014/05/BEACH-FISHING.jpg" style="width:225px; height:150px;" alt="Deluxe Beach Coffin">
				</div>
				<div class="col-md">
					<label for="beachQty">Qty</label><input type="number" class="cartQty" id="beachQty" name="beachQty" min="0" placeholder="0" 
						<?php echo "value='$beachQty'";?>
					> @ $4,500 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $beachQty*4500; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="beachSubmit" name="beachSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($dellQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="http://www.device.pl/content/images/thumbs/0002415_dell-optiplex-380-pentium-dc.jpeg" style="width:150px; height:150px;" alt="Industrial Dell Computer">
				</div>
				<div class="col-md">
					<label for="dellQty">Qty</label><input type="number" class="cartQty" id="dellQty" name="dellQty" min="0" placeholder="0" 
						<?php echo "value='$dellQty'";?>
					> @ $500 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $dellQty*500; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="dellSubmit" name="dellSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($compQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="https://thumbs.dreamstime.com/b/old-computer-6729508.jpg" style="width:112px; height:150px;" alt="Deluxe Computer">
				</div>
				<div class="col-md">
					<label for="compQty">Qty</label><input type="number" class="cartQty" id="compQty" name="compQty" min="0" placeholder="0" 
						<?php echo "value='$compQty'";?>
					> @ $1,500 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $compQty*1500; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="compSubmit" name="compSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($blueQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="http://woodworking-kids.com/content/2010/09/51EGTV0Xb2L._SL500_AA300_1.jpg" style="width:150px; height:150px;" alt="Deluxe Children's Toolset - Blue">
				</div>
				<div class="col-md">
					<label for="blueQty">Qty</label><input type="number" class="cartQty" id="blueQty" name="blueQty" min="0" placeholder="0" 
						<?php echo "value='$blueQty'";?>
					> @ $40 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $blueQty*40; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="blueSubmit" name="blueSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div class="row <?php if($pinkQty==0) echo 'd-none';?>">
				<div class="col-sm mx-auto">
					<img src="https://grkids.com/wp-content/uploads/2013/06/grip-pink-set.jpg" style="width:150px; height:150px;" alt="Deluxe Children's Toolset - Pink">
				</div>
				<div class="col-md">
					<label for="pinkQty">Qty</label><input type="number" class="cartQty" id="pinkQty" name="pinkQty" min="0" placeholder="0" 
						<?php echo "value='$pinkQty'";?>
					> @ $40 each</p>
				</div>
				<div class="col-md">
					<p>Subtotal $<?php echo $pinkQty*40; ?></p>
				</div>
				<div class="col-sm">
					<input type="submit" role="button" id="pinkSubmit" name="pinkSubmit" class="btnAddCart btn btn-secondary" value="Update Cart">
				</div>
			</div>
			<div <?php 
					if($pinkQty===null && $blueQty===null && $compQty===null && $dellQty===null && $pineQty===null && $cedarQty===null && $mahoganyQty===null && $beachQty===null) echo "id='totals'";?> class="row">
				<div class="col-sm">
					<a class="btn btn-secondary" href="browse.php" role="button" id="browse">Return to Shopping</a>
				</div>
				<div class="col-lg">
					<h3><?php echo $pineQty + $mahoganyQty + $cedarQty + $beachQty + $dellQty + $compQty + $blueQty + $pinkQty; ?> Items Totaling $<?php echo $pineQty*1500 + $mahoganyQty*2500 + $cedarQty*3500 + $beachQty*4500 + $dellQty*500 + $compQty*1500 + $blueQty*40 + $pinkQty*40; ?></h3>
				</div>
				<div class="col-sm">
					<a class="btn btn-success" href="checkout.php" role="button" id="checkout">Checkout</a>
				</div>
			</div>
		</form>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>