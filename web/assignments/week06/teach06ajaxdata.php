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
