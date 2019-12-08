<?php
    // Create database if it doesn't exist:
    $db_path = "users.db";
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

    $info = json_decode(json_encode($_POST), true);
    $res = $db->query("SELECT * FROM users WHERE username = '$info[user]'");

    if ( (!isset($info[user]) || !isset($info[password])) || ($info[user] == "" || $info[password] == "") ){
        echo "<a href='#user' class='vertify-booking'>Please enter username and password.</a>";
        return;
    }

    if (isset($info[email]) && $info[email] != "" && !filter_var($info[email], FILTER_VALIDATE_EMAIL)) {
        echo "<a href='#email' class='vertify-booking'>The email : '$info[email]' is not a valid mail adress.</a>";
        return;
    }

    if ($row = $res->fetchArray()){
        echo "<a href='#user' class='vertify-booking'>The username : '$info[user]' already exists please choose another username.</a>";
        return;
    }

   
    $pwd_hash = hash("sha256", $info[password]);
    $db->exec("INSERT INTO users(username, password_h, name, last_name, sexe, email, birthdate, adress, phone_number) VALUES('".$info[user]."','".$pwd_hash."','".$info[name]."','".$info[last_name]."','".$info[sexe]."','".$info[email]."','".$info[bdate]."','".$info[adress]."','".$info[phone]."')");
?>