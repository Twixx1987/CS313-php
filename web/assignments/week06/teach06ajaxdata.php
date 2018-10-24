<?php
// include the DB access
include "../week05/teach05dbaccess.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Insert into db

    $query = 'INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)';
    $stmt = $db->prepare($query);
    $stmt->execute(array(':book' => $_POST['book'], ':chapter' => $_POST['chapter'], ':verse' => $_POST['verse'], ':content' => $_POST['content']));

    $newId = $db->lastInsertId('scriptures_id_seq');

    if(isset($_POST['newTopicName'])) {
        $query2 = 'INSERT INTO topic (name) VALUES (:name)';
        $stmt2 = $db->prepare($query2);
        $stmt2->execute(array(':name' => $_POST['newTopicName']));

        $topicId = $db->lastInsertId('topic_id_seq');

        $query = 'INSERT INTO scripture_topic (scriptures_id, topic_id) VALUES (:scripture, :topic)';
        $stmt = $db->prepare($query);
        $stmt->execute(array(':scripture' => $newId, ':topic' => $topicId));
    }

    foreach ($_POST['topics'] as $topic) {
        $query = 'INSERT INTO scripture_topic (scriptures_id, topic_id) VALUES (:scripture, :topic)';
        $stmt = $db->prepare($query);
        $stmt->execute(array(':scripture' => $newId, ':topic' => $topic));
    }
}
?>
<h2>Add new Scriptures</h2>
<form  class="container" name="scriptureForm" action="teach06ajaxdata.php" onsubmit="ajaxSubmit(); return false;" method="POST">
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

    <ul id="topics">
        <!-- fetch the list of topics from database -->
        <?php
        $statement = $db->query('SELECT * FROM topic ORDER BY name');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
            ?>
            <li><input type="checkbox" name="topics[]" value="<?php echo $row['id']; ?>"/><?php echo $row['name']; ?></li>
        <?php
        endwhile;
        ?>
        <li><input type="checkbox" name="newTopic" value="newTopic"/><input type="text" name="newTopicName" placeholder="New Topic"/></li>
    </ul>
    <br/>
    <input type="submit" name="submit" value="Submit" class="btn btn-secondary"/>
</form>
<h2>Scripture Reference List</h2>
<ul>
    <?php
    $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)):
        ?>
        <li><strong><?php echo $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse']; ?></strong> - "<?php echo $row['content']; ?>"</li>
    <?php
    endwhile;
    ?>
</ul>
<?php
    // end the php file
?>
