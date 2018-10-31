<?php 
    session_start();
    $user = $_SESSION['user'];

    if($user == NULL) {
        $newURL = "./signin.php";
        header('Location: ' . $newURL);
        die();
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
        <h1>Welcome <?php echo $user; ?></h1>
    </body>
</html>