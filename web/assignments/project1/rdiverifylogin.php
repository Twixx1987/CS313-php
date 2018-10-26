<?php
// check to see if the user is logged in
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    // set the user_id and username variables
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
} else {
    // clean the output buffer
    ob_clean();

    // redirect to the login page based on code from https://www.bing.com/videos/search?q=how+to+redirect+to+another+page+using+php&view=detail&mid=09FEDBEAEB640A5D76BE09FEDBEAEB640A5D76BE&FORM=VIRE
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/assignments/project1/rdilogin.php', true, 303);

    // terminate php script upon redirect
    exit();
}
?>