<?php
    $db_path = $_SERVER['DOCUMENT_ROOT']."/Projet-Boissons/database/users.db";
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
    );");
    $db->exec("CREATE TABLE IF NOT EXISTS FavouriteRecipes(
        username VARCHAR(16) NOT NULL, 
        recette_id INT,
        FOREIGN KEY (username) REFERENCES users(username)
    );"); 
?>