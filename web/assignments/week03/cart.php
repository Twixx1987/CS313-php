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
				<p>A simple yet rustic coffin for a reasonable price. This is made of solid pine planks giving it that beautiful rustic look.</p>
				<p>Qty <?php echo $pineQty ?> at $1,500 each</p>
				<p>Subtotal $<?php echo round($pineQty*1500,2) ?></p>
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
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://www.device.pl/content/images/thumbs/0002415_dell-optiplex-380-pentium-dc.jpeg" style="width:300px; height:300px;" alt="Industrial Dell Computer">
			</div>
			<div class="col-md">
				<p>This industrial strength Dell computer is perfect for all but the heavy users. Just add a monitor, mouse, and keyboard and you will be set.</p>
				<label for="dellQty">Qty</label><input type="number" class="cartQty" id="dellQty" name="dellQty" min="0" placeholder="0"> at $500 each<br/>
				<input type="submit" id="dellSubmit" name="dellSubmit" class="btnAddCart" value="Add to Cart">
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="https://thumbs.dreamstime.com/b/old-computer-6729508.jpg" style="width:224px; height:300px;" alt="Deluxe Computer">
			</div>
			<div class="col-md">
				<p>Though this computer appears to be from a bygone age, it is truly a powerhouse. The casing is just a facade to help protect your assets.</p>
				<label for="compQty">Qty</label><input type="number" class="cartQty" id="compQty" name="compQty" min="0" placeholder="0"> at $1,500 each<br/>
				<input type="submit" id="compSubmit" name="compSubmit" class="btnAddCart" value="Add to Cart">
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="http://woodworking-kids.com/content/2010/09/51EGTV0Xb2L._SL500_AA300_1.jpg" style="width:300px; height:300px;" alt="Deluxe Children's Toolset - Blue">
			</div>
			<div class="col-md">
				<p>Do you have a young one ready to create? This deluxe blue children's toolset is perfect for teaching your son how to work with his hands.</p>
				<label for="blueQty">Qty </label><input type="number" class="cartQty" id="blueQty" name="blueQty" min="0" placeholder="0"> at $40 each<br/>
				<input type="submit" id="blueSubmit" name="blueSubmit" class="btnAddCart" value="Add to Cart">
			</div>
		</div>
		<div class="row">
			<div class="col-sm mx-auto">
				<img src="https://grkids.com/wp-content/uploads/2013/06/grip-pink-set.jpg" style="width:300px; height:300px;" alt="Deluxe Children's Toolset - Pink">
			</div>
			<div class="col-md">
				<p>Do you have an avid young engineer to be in your household? This deluxe pink children's toolset is perfect for teaching your daughter the tricks of the trade.</p>
				<label for="pinkQty">Qty</label><input type="number" class="cartQty" id="pinkQty" name="pinkQty" min="0" placeholder="0"> at $40 each<br/>
				<input type="submit" id="pinkSubmit" name="pinkSubmit" class="btnAddCart" value="Add to Cart">
			</div>
		</div>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>