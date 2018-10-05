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
    <title>Catalog</title>
</head>
<body>
	<?php
		$_SESSION["items[]"];
	?>

    <h1 class="pagetitle container"><a href="browse.php">Coffins and More</a></h1>
	<div class="menu container">
		<?php include "../../top_menu.php"; ?>
	</div>
	<div class="container">
		<h2>Our Catalog</h2>
		<div id="featuredProducts" class="carousel slide carouselContainer" data-ride="carousel">
			<h3>Featured Product</h3>
			<ol class="carousel-indicators">
				<li data-target="#featuredProducts" data-slide-to="0" class="active"></li>
				<li data-target="#featuredProducts" data-slide-to="1"></li>
				<li data-target="#featuredProducts" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner bg-secondary">
				<div class="carousel-item active">
					<a href="coffins.php">
						<img class="carouselImage" src="http://www.goodfuneralguide.co.uk/wp-content/uploads/2013/01/Honest-Coffin.jpg" style="width:802px; height:600px;" alt="Deluxe Pine Coffin">
					</a>
					<div class="subtext">
						<p>We have a large selection of stock and custom coffins.</p>
					</div>
				</div>
				<div class="carousel-item">
					<a href="computers.php">
						<img class="carouselImage" src="https://thumbs.dreamstime.com/b/old-computer-6729508.jpg" style="width:449px; height:600px;" alt="Deluxe Computer">
					</a>
					<div class="subtext">
						<p>Our computer selection is noteable.</p>
					</div>
				</div>
				<div class="carousel-item">
					<a href="tools.php">
						<img class="carouselImage" src="http://woodworking-kids.com/content/2010/09/51EGTV0Xb2L._SL500_AA300_1.jpg" style="width:600px; height:600px;" alt="Deluxe Children's Toolset">
					</a>
					<div class="subtext">
						<p>We even have great tools for sale.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#featuredProducts" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#featuredProducts" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</body>
</html>