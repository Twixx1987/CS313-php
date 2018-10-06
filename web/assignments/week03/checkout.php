<?php
//start the session
session_start();

// create an array of countries
$countries = array("Canada", "United States of America");

// create an array of states
$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", 
	"Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", 
	"Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", 
	"Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", 
	"North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", 
	"South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington","West Virginia", "Wisconsin", 
	"Wyoming", "Alberta", "British Columbia", "Manitoba", "New Brunswick", "Newfoundland", "Nova Scotia", "Ontario", 
	"Prince Edward Island", "Quebec", "Saskatchewan");
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
	<?php
		$_SESSION["items[]"];
	?>

    <h1 class="pagetitle container">Coffins and More</h1>
	<div class="menu container">
		<?php include "shopping_menu.php"; ?>
	</div>
	<div class="container">
		<h2>Checkout</h2>
		<form id="checkout" action="confirmation.php" method="post">
			<p class="required">* Indicates required fields</p>
			<div class="row">
				<div class="col">
					<label class="label" for="firstName">First Name</label><br/><input type="text" id="firstName" name="firstName" placeholder="First Name" required><span class="required">*</span><br/> 
				</div>
				<div class="col">
					<label class="label" for="lastName">Last Name</label><br/><input type="text" id="lastName" name="lastName" placeholder="Last Name" required><span class="required">*</span><br/> 
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label class="label" for="street1">Street address</label><br/><input type="text" id="street1" name="street1" placeholder="Street address line 1" required><span class="required">*</span><br/>
					<input type="text" id="street2" name="street2" placeholder="Street address line 2"><br/> 
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label class="label" for="city">City</label><br/><input type="text" id="city" name="city" placeholder="City" required><span class="required">*</span><br/> 
				</div>
				<div class="col">
					<label class="label" for="state">State</label><br/><select id="state" name="state">
						<?php 
							foreach($states as $state) {
								echo "<option value='$state'>$state</option>";
							}
						?>
					</select><br/> 
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label class="label" for="zip">Zip Code</label><br/><input type="number" id="zip" name="zip" placeholder="Zip Code" required><span class="required">*</span><br/> 
				</div>
				<div class="col">
					<label class="label" for="country">Country</label><br/><select id="country" name="country">
						<?php 
							foreach($countries as $country) {
								echo "<option value='$country'";
								if($country=="United States of America") {
									echo " selected ";
								} 
								echo ">$country</option>";
							}
						?>
					</select><br/>  
				</div>
			</div>
			<hr></hr>
			<div class="row">
				<div class="col">
					<a href="cart.php" role="button" id="cartReturn" name="submit" class="btnAddCart btn btn-warning">Return to Cart</a><br/>
				</div>
				<div class="col">
					<input type="submit" role="button" id="checkoutSubmit" name="submit" class="btnAddCart btn btn-success" value="Finalize Purchase"><br/>
				</div>
			</div>
		</form>
	</div><br/>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
</body>
</html>