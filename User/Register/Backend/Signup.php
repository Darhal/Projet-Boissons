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

    echo ".$_POST[user].",".$_POST[password].",".$_POST[name].",".$_POST[last_name].",".$_POST[sexe].",".$_POST[email].",".$_POST[bdate].",".$_POST[adress].",".$_POST[phone].";
    $db->exec("INSERT INTO users(username, password_h, name, last_name, sexe, email, birthdate, adress, phone_number) VALUES('".$_POST['user']."','".$_POST['password']."','".$_POST['name']."','".$_POST['last_name']."','".$_POST['sexe']."','".$_POST['email']."','".$_POST['bdate']."','".$_POST['adress']."','".$_POST['phone']."')");
?>