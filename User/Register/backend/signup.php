<?php
    // Create database if it doesn't exist:
    include("../../../database/database.php");

    $info = json_decode(json_encode($_POST), true);
    $res = $db->query("SELECT * FROM users WHERE username = '".$info['user']."'");

    if ( (!isset($info["user"]) || !isset($info["password"])) || ($info["user"] == "" || $info["password"] == "") ){
        echo "<a href='#user' class='vertify-booking'>Please enter username and password.</a>";
        return;
    }

    if (isset($info["email"]) && $info["email"] != "" && !filter_var($info["email"], FILTER_VALIDATE_EMAIL)) {
        echo "<a href='#email' class='vertify-booking'>The email : '".$info['email']."' is not a valid mail adress.</a>";
        return;
    }

    if ($row = $res->fetchArray()){
        echo "<a href='#user' class='vertify-booking'>The username : '".$info['user']."' already exists please choose another username.</a>";
        return;
    }

   
    $pwd_hash = hash("sha256", $info['password']);
    $values = "'".$info['user']."','".$pwd_hash."','".$info['name']."','".$info['last_name']."','".$info['sexe']."','".$info['email']."','".$info['bdate']."','".$info['adress']."','".$info['phone']."'";
    $db->exec("INSERT INTO users(username, password_h, name, last_name, sexe, email, birthdate, adress, phone_number) VALUES($values);");
    
    if (isset($_COOKIE["fav_recp_len"])){
        $i = 0;
        foreach($_COOKIE["fav_recp"] as $id){
            $values = "'".$info["user"]."', ".$id;
            $db->exec("INSERT INTO FavouriteRecipes(username, recette_id) VALUES($values);");
            unset($_COOKIE["fav_recp[$i]"]);
            $i++;
        }

        unset($_COOKIE["fav_recp_len"]);
    }
    
    echo "true";
?>