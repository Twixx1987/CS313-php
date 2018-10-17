
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />

    <!-- Page title -->
    <title>Scripture Resources</title>
</head>
<body>
	<h1>Scripture Resources</h1>
	<form id="search" name="search" method="post" action="teach05results.php">
		<label for="book">Enter the name of a book to search for content from it.</label><br />
		<input type="text" name="book" id="book" placeholder="Book" <?php if ($_SERVER["REQUEST_METHOD"]=="POST") echo 'value="' . $book .'"';?>><br/>
		<input type="submit" value="Submit" name="submit">
	</form>

</body>
</html>
