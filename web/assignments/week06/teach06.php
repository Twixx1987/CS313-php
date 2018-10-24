<?php
// include the DB access
include "../week05/teach05dbaccess.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Insert into db

	$query = 'INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';
	$stmt = $db->prepare($query);
	$pdo = $stmt->execute(array(':book' => $_POST['book'], ':chapter' => $_POST['chapter'], ':verse' => $_POST['verse'], ':content' => $_POST['content']));

	$newId = $db->lastInsertId('scriptures_id_seq');

	foreach ($_POST['topics'] as $topic) {
		$query = 'INSERT INTO scripture_topic (scriptures_id, topic_id) VALUES (:scripture, :topic)';
		$stmt = $db->prepare($query);
		$stmt->execute(array(':scripture' => $newId, ':topic' => $topic));
	}
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
    <script src="../assignments.js"></script>

    <!-- Page title -->
    <title>Scripture Resources</title>
</head>
<body>
	<h1 class="container">Scripture Resources</h1>
    <div class="menu container">
        <?php include '../../top_menu.php'; ?>
    </div>
    <?php
		$statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
    ?>
	<p class="container"><strong><?php echo $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse']; ?></strong> - "<?php echo $row['content']; ?>"</p>
    <?php
        endwhile;
	?>

    <form  class="container"action="teach06.php" method="POST">
        <label>Book</label>
		<input type="text" name="book">
		<br />
        <label>Chapter</label>
		<input type="text" name="chapter">
		<br />
        <label>Verse</label>
        <input type="text" name="verse">
		<br />
        <textarea name="content" rows=5 cols=40 placeholder="Contents"></textarea><br>

		<!-- fetch the list of topics from database -->
		<?php
		    $statement = $db->query('SELECT * FROM topic ORDER BY name');
		    while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
		?>
        <input type="checkbox" name="topics[]" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?><br>
		<?php
            endwhile;
		?>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
