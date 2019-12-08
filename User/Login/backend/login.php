<?php
    $db_path = "../../../database/users.db";
    $db = new SQLite3($db_path);
    $db->exec("CREATE TABLE IF NOT EXISTS users(
        username VARCHAR(16) PRIMARY KEY, 
        password_h VARCHAR(64), 
        name VARCHAR(24),
        last_name VARCHAR(24),
        sexe VARCHAR(24),
        email VARCHAR(64),
        birthdate DATE,
        adress VARCHAR(512),
        phone_number VARCHAR(16)
    )");
    $info = $_POST;
    $res = $db->query("SELECT * FROM users WHERE username = '$info[user]'");

    if ($row = $res->fetchArray()){
        $pwd_hash = hash("sha256", $info[password]);

        if ($pwd_hash === $row[password_h]){
            echo "<a>Access granted</a>";
        }else{
            echo "<a>Access denied: Wrong password</a>";
        }
    }else{
        echo "<a>Access denied: Invalid username</a>";
    }
?>