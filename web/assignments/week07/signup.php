<?php

require '../project1/rdidbconnect.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $numbermatch = preg_match('/\d/', $password);

    if ($password == $password2 && strlen($password) > 6 && $numbermatch == 1) {

        $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = 'INSERT INTO week07user (user_name, password) VALUES (:username, :password)';
        $stmt = $db->prepare($query);
        $pdo = $stmt->execute(array(':username' => $_POST['username'], ':password' => $hashpassword));
    
        $newURL = "./signin.php";
        header('Location: ' . $newURL);
        die();

    } else {
        $error = 'Password requirements: Passwords must match. Passwords must contain a minimum of 7 characters. Passwords must include at least one number.';
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
        <h1 class="pagetitle container">Create an Account</h1>
        <div class="menu container">
            <?php include '../../top_menu.php'; ?>
        </div>
        <div class="container" id="login">
            <p><?php echo $error; ?></p>
            <form action="signup.php" method="POST">
                <span>Username<input type="text" name="username" value=""></span><br>
                <span>Password<input type="password" name="password" value=""></span><span class="error"><?php echo ($error == '') ? '' : '*';  ?></span><br>
                <span>Retype Password <input type="password" name="password2" value=""></span><span class="error"><?php echo ($error == '') ? '' : '*';  ?></span><br>
                <input type="submit">
            </form>
        </div>
    </body>
</html>