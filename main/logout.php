<?php
    // restaurt session
    session_start();
    //clean array de session 
    $_SESSION = array();
    // destroy session
    session_destroy();
    // destroy array session
    unset($_SESSION);

    // Delete cookies
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', 1);
            setcookie($name, '', 1, '/');
        }
    }

    //When user log out , back to index.php where he can either log in or sign up
    header("Location: index.php");
?>
