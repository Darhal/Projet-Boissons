<?php
    include("../../../database/database.php");

    function DeleteCookies()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', 1);
                setcookie($name, '', 1, '/');
            }
        }
    }

    $info = $_POST;
    $res = $db->query("SELECT * FROM users WHERE username = '".$info['user']."';");
    if ($row = $res->fetchArray()){
        $pwd_hash = hash("sha256", $info["password"]);
        if ($pwd_hash === $row["password_h"]){
            //DeleteCookies();
            session_start();
            $_SESSION["username"] = $row["username"];
            echo "true";
        }else{
            echo "<a>Access denied: Wrong password</a>";
        }
    }else{
        echo "<a>Access denied: Invalid username</a>";
    }
?>
