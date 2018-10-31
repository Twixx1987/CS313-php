<?php

require '../project1/rdidbconnect.php';

session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = 'SELECT name, password FROM week07user WHERE name=:name';
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS and Custom Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../homepage.css" />

    <!-- Required JavaScript and Custom JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src=""></script>

    <!-- Page title -->
    <title>Week 07 - Welcome</title>
</head>
    <body>
        <div class="container" id="signup"><a href="signup.php">Create an account</a></div>
        <div class="container" id="login">
	        <h1>Please sign in</h1>
            <p class="error"><?php echo $error; ?></p>
            <form action="signin.php" method="POST">
                <span>Username<input type="text" name="username" value=""></span><br>
                <span>Password<input type="password" name="password" value=""></span><br>
                <input type="submit">
            </form>
        </div>
    </body>
</html>