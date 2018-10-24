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

    <!-- Page title -->
    <title>Scripture Resources</title>
</head>
<body>
	<h1>Scripture Resources</h1>
	<?php
		$statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		  echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong>';
		  echo ' - "' . $row['content'] . '"<br/>';
		}

	?>

    <form action="team_assignment_06.php" method="POST">
      <label>Book
				<input type="text" name="book">
			</label><br>
      <label>Chapter
				<input type="text" name="chapter">
			</label><br>
      <label>Verse
				<input type="text" name="verse">
			</label><br>

      <textarea name="content" rows=5 cols=40 placeholder="Contents"></textarea><br>

			<!-- fetch the list of topics from database -->
			<?php
		$statement = $db->query('SELECT * FROM topic ORDER BY name');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '">' . $row['name'] . '<br>';
		}
		?>

      <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
