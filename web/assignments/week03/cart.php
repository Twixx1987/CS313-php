<?php
//start the session
session_start();

// get the session variable values
$items = $_SESSION["items"];

// get the individual items
$pineQty = $items["pineQty"];
$mahoganyQty = $items["mahoganyQty"];
$cedarQty = $items["cedarQty"];
$beachQty = $items["beachQty"];
$blueQty = $items["blueQty"];
$pinkQty = $items["pinkQty"];
$dellQty = $items["dellQty"];
$compQty = $items["compQty"];

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
    <title>Shopping Cart</title>
</head>
<body>
<?php print_r($_SESSION); ?>
    <h1 class="pagetitle container"><a href="browse.php">Coffins and More</a></h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>Cart</h2>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://www.goodfuneralguide.co.uk/wp-content/uploads/2013/01/Honest-Coffin.jpg" style="width:200px; height:150px;" alt="Deluxe Pine Coffin">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $pineQty; ?> @ $1,500 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $pineQty*1500; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="https://static.turbosquid.com/Preview/2014/07/11__22_47_27/Coffin2_2.jpgb9394da4-5103-4409-9c3b-07fbc28eeaf1Original.jpg" style="width:150px; height:150px;" alt="Deluxe Mahogany Coffin">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $mahoganyQty;?> @ $2,500 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $mahoganyQty*2500; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://newhavenfunerals.com.au/wp-content/uploads/2014/05/ASHURST-CEDAR.jpg" style="width:213px; height:150px;" alt="Deluxe Cedar Coffin">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $cedarQty;?> @ $3,500 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $mahoganyQty*3500; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img class="mx-auto" src="https://i0.wp.com/newhavenfunerals.com.au/wp-content/uploads/2014/05/BEACH-FISHING.jpg" style="width:225px; height:150px;" alt="Deluxe Beach Coffin">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $beachQty;?> @ $4,500 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $beachQty*4500; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://www.device.pl/content/images/thumbs/0002415_dell-optiplex-380-pentium-dc.jpeg" style="width:150px; height:150px;" alt="Industrial Dell Computer">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $dellQty; ?> @ $500 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $dellQty*500; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="https://thumbs.dreamstime.com/b/old-computer-6729508.jpg" style="width:112px; height:150px;" alt="Deluxe Computer">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $compQty; ?> @ $1,500 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $compQty*1500; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://woodworking-kids.com/content/2010/09/51EGTV0Xb2L._SL500_AA300_1.jpg" style="width:150px; height:150px;" alt="Deluxe Children's Toolset - Blue">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $blueQty; ?> @ $40 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $blueQty*40; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="https://grkids.com/wp-content/uploads/2013/06/grip-pink-set.jpg" style="width:150px; height:150px;" alt="Deluxe Children's Toolset - Pink">
			</div>
			<div class="col-md">
				<p>Qty <?php echo $pinkQty; ?> @ $40 each</p>
			</div>
			<div class="col-md">
				<p>Subtotal $<?php echo $pinkQty*40; ?></p>
			</div>
		</div>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>