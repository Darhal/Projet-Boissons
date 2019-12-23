<?php
    include("../../../database/database.php");
    
    $info = $_POST;
    $res = $db->query("SELECT * FROM users WHERE username = '".$info['user']."';");

    if ($row = $res->fetchArray()){
        $pwd_hash = hash("sha256", $info["password"]);

        if ($pwd_hash === $row["password_h"]){
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