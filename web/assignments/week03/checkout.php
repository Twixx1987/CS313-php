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
    <link rel="stylesheet" href="../../homepage.css" />
    
    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="shopping.js"></script>

    <!-- Page title -->
    <title>Checkout</title>
</head>
<body>
<?php print_r($_SESSION); ?>
	<?php
		$_SESSION["items[]"];
	?>

    <h1 class="pagetitle container">Coffins and More</h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>Checkout</h2>
		<form id="checkout" action="checkout.php" method="post">
			<label for="firstName">First Name</label><br/><input type="text" id="firstName" name="firstName" placeholder="First Name"><br/> 
			<label for="lastName">Last Name</label><br/><input type="text" id="lastName" name="lastName" placeholder="Last Name"><br/> 
			<label for="street1">Street address</label><br/><input type="text" id="street1" name="street1" placeholder="Street address line 1"> 
			<input type="text" id="street2" name="street2" placeholder="Street address line 2"><br/> 
			<label for="city">City</label><br/><input type="text" id="city" name="city" placeholder="City"><br/> 
			<label for="state">State</label><br/><input type="text" id="state" name="state" placeholder="State"><br/> 
			<label for="zip">Zip Code</label><br/><input type="text" id="zip" name="zip" placeholder="Zip Code"><br/> 
			<label for="country">Country</label><br/><input type="text" id="country" name="country" placeholder="Country"><br/> 
			<input type="submit" role="button" id="checkoutSubmit" name="submit" class="btnAddCart btn btn-secondary" value="Finalize Purchase"><br/> 
		</form>
	</div>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>