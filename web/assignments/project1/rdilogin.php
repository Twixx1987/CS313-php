<?php 
    // upon navigating to the login page the session variables will be cleared and the session destroyed
    session_destroy();

    // now start a new session for new login
    session_start();

    // clear any restored session variables
    while (count($_SESSION)) {
        array_pop($_SESSION);
    }

    // include the DB connection
    require 'rdidbconnect.php';

    // create a variable to store a login error if needed
    $error = "";

    // check for post login button
    if (isset($_POST['username'])) {
        // get the username and password and clean the inputs
        $username = cleanInputs($_POST['username']);
        $password = cleanInputs($_POST['password']);

        // query the database for the username and password
        $statement = $db->prepare('SELECT user_name, password, user_id FROM rdi_user WHERE user_name=:username');
        $statement->execute(array(':username' => $username));
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            // check to see if the username/password combo match the DB
            if ($row['user_name'] == $username && $row['password'] == $password) {
                // set the user_id and username to session variables
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['user_name'];

                // clean the output buffer
                ob_clean();
                // redirect to the home page based on code from https://www.bing.com/videos/search?q=how+to+redirect+to+another+page+using+php&view=detail&mid=09FEDBEAEB640A5D76BE09FEDBEAEB640A5D76BE&FORM=VIRE
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/assignments/project1/rdihome.php', true, 303);

                // terminate php script upon redirect
                exit();
            }
        }

        // if no match was found populate an error message
        $error = "Username and/or password not found. Please try again.";
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="rdi.js"></script>

    <!-- Page title -->
    <title>RDI Login</title>
</head>
<body>
	<h1 class="pagetitle container">RDI Login</h1>
	<div class="menu container">
		<ul id="navigation" class="nav flex-column flex-sm-row menu-list btn btn-secondary">
        <li class="nav-item flex-sm-fill text-sm-center">
          <a class="nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary" role="button" href="/homepage.php">CS313 Home</a>
        </li>
      </ul>
	</div>
	<div class="container">
		<div class="container error">
			<p><?php echo $error;?></p>
		</div>
		<form id="login" name="login" method="post" action="rdilogin.php">
			<label for="username">Username:</label><br/>
			<input type="text" name="username"><br/>
			<label for="password">Password:</label><br/>
			<input type="password" name="password"><br/>
			<input type="submit" name="login" value="Login">
			<button id="signup" onclick="signup">Sign Up</button>
			<input type="checkbox" name="signupcheck" id="signupcheck">
		</form>
	</div>
</body>
</html>