<?php
    if (isset($_SESSION["username"])) {
        session_unset();
        session_destroy();
        $past = 1;
        
        foreach ( $_COOKIE["fav_recp"] as $key => $value )
        {
            setcookie("fav_recp[$key]", null, $past, '/' );
        }

        setcookie("fav_recp_len", 0, $past, '/' );
    }

    header("Location: index.php");
?>