<?php include 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {

        $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = 'INSERT INTO public."user" (name, password) VALUES (:name, :password)';
        $stmt = $db->prepare($query);
        $pdo = $stmt->execute(array(':name' => $_POST['name'], ':password' => $hashpassword));
    
        $newURL = "./signin.php";
        header('Location: ' . $newURL);
        die();

    } else {
        $error = 'Passwords must match';
    }

}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />

        <!-- Page title -->
        <title>Database Signup</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div id="login">
	        <h1>Create an Account</h1>
            <p><?php echo $error; ?></p>
            <form action="signup.php" method="POST">
                <span>Username<input type="text" name="name" value=""></span><br>
                <span>Password<input type="password" name="password" value=""></span><?php echo ($error == '') ? '' : '*';  ?><br>
                <span>Retype Password <input type="password" name="password2" value=""></span><?php echo ($error == '') ? '' : '*';  ?><br>
                <input type="submit">
            </form>
        </div>
    </body>
</html>