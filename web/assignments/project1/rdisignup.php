<?php
// include the DB connection
require 'rdidbconnect.php';

// create a variable to store a login error if needed
$error = '';

// check for post login button
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the username and passwords
    $username = cleanInputs($_POST['username']);
    $password = cleanInputs($_POST['password']);
    $password2 = cleanInputs($_POST['password2']);

    // verify password match and password length
    if ($password == $password2 && strlen($password) > 7) {
        // hash the password
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        try {
            $query = 'INSERT INTO rdi_user (user_name, password) VALUES (:username, :password)';
            $stmt = $db->prepare($query);
            $pdo = $stmt->execute(array(':username' => $username, ':password' => $hashpassword));

            // clean the output buffer
            ob_clean();

            // redirect to the login page
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/assignments/project1/rdilogin.php', true, 303);

            // end the php execution
            die();
        } catch(Exception $e) {
            $error = "ERROR: " . $e->getMessage();
        }
    } else {
        // throw an error
        $error = 'Password requirements: Passwords must match. Passwords must contain a minimum of 7 characters. Passwords must include at least one number.';
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
    <link rel="stylesheet" href="rdi.css" />

    <!-- Required JavaScript and Custom JavaScript -->
    <script src="rdi.js"></script>

    <!-- Page title -->
    <title>RDI-Tracker Sign Up</title>
</head>
    <body>
        <div class="container fixed-top bg-white">
            <h1 class="pagetitle">Create an RDI-Tracker Account</h1>
            <div class="menu container bg-secondary">
                <?php include 'rdimenu.php'; ?>
            </div>
        </div>
        <div class="container body" id="login">
            <h2>Sign Up for RDI Tracker</h2>
            <div id="topError" class="error"><?php echo $error; ?></div>
            <form action="rdisignup.php" method="POST" onsubmit="return validateForm()">
                <span>Username<input type="text" name="username" value=""></span><br>
                <span>Password<input type="password" name="password" id="password" value=""></span>
                <span id="sideError1" class="error"></span><br>
                <span>Retype Password <input type="password" name="password2" id="password2" value=""></span>
                <span id="sideError2" class="error"></span><br /><br />
                <input type="submit" class="btn btn-secondary button">
                <a class="btn btn-secondary button" role="button" href="/assignments/project1/rdilogin.php">Return to Sign In</a>
            </form>
        </div>
        <br />
        <div class="footer text-sm-center container bg-secondary text-white">
            <?php include 'rdirightsfooter.php'; ?>
        </div>
    </body>
</html>