<?php
    session_start();
    include("../../database/database.php");
    $user = $_SESSION['username'];

    $info = json_decode(json_encode($_POST), true);
    
    $db->exec("
        UPDATE users
        SET 
            name = '".$info['name']."',
            last_name = '".$info['last_name']."',
            email = '".$info['email']."',
            birthdate = '".$info['birthdate']."',
            adress = '".$info['adress']."',
            phone_number = '".$info['phone']."'
        WHERE
            username = '$user';
    ");

    echo "Information updated sucessfully!";
?>