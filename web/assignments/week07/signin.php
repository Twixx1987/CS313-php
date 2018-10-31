<?php include 'db.php';

session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = 'SELECT name, password FROM public.user WHERE name=:name';
    $stmt = $db->prepare($query);
    $pdo = $stmt->execute(array(':name' => $_POST['username']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $loggedIn = password_verify($_POST['password'], $rows[0]['password']);
    if ($loggedIn) {
        $_SESSION['user'] = $_POST['username'];
        $newURL = "./welcome.php";
        header('Location: ' . $newURL);
        die();
    } else {
        $error = 'Incorrect username or password';
    }
}

?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />

        <!-- Page title -->
        <title>Database Sign In</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div id="signup"><a href="signup.php">Create an account</a></div>
        <div id="login">
	        <h1>Please sign in</h1>
            <form action="signin.php" method="POST">
                <span>Username<input type="text" name="username" value=""></span><br>
                <span>Password<input type="password" name="password" value=""></span><br>
                <input type="submit">
            </form>
            <?php echo $error; ?>
        </div>
    </body>
</html>