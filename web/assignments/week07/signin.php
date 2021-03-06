<?php

require '../project1/rdidbconnect.php';

session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the username and password and clean the inputs
    $username = cleanInputs($_POST['username']);
    $password = cleanInputs($_POST['password']);

    $query = 'SELECT password FROM week07user WHERE user_name=:username';
    $stmt = $db->prepare($query);
    $pdo = $stmt->execute(array(':username' => $username));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $loggedIn = password_verify($password, $rows[0]['password']);
    if ($loggedIn) {
        $_SESSION['username'] = $username;
        $newURL = "./welcome.php";
        header('Location: ' . $newURL);
        die();
    } else {
        $error = 'Incorrect username or password';
    }
}

// a function to clean the data
function cleanInputs($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        <h1 class="pagetitle container">User Login</h1>
        <div class="menu container">
            <?php include '../../top_menu.php'; ?>
        </div>
        <div class="container" id="signup"><a href="signup.php">Create an account</a></div>
        <div class="container" id="login">
            <p class="error"><?php echo $error; ?></p>
            <form action="signin.php" method="POST">
                <span>Username<input type="text" name="username" value=""></span><br>
                <span>Password<input type="password" name="password" value=""></span><br>
                <input type="submit" class="btn btn-secondary">
            </form>
        </div>
    </body>
</html>