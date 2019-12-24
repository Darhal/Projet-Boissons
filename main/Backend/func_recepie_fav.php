<?php
    session_start();
    include("../../database/database.php");
    $id = $_POST["recepie_id"];
    $count = 0;

    if(isset($_SESSION["username"])) {
        $res = $db->query("SELECT recette_id FROM FavouriteRecipes WHERE username = '".$_SESSION["username"]."';");
        $my_list = array();

        while ($row = $res->fetchArray(1)){
            array_push($my_list, $row);
            $count += 1;
        }
        
        if (!in_array($id, $my_list)){
            $values = "'".$_SESSION["username"]."', ".$id;
            $db->exec("INSERT INTO FavouriteRecipes(username, recette_id) VALUES($values);");
            $count += 1;
        }
    }else{
        $index = 0;
        if (!isset($_COOKIE['fav_recp_len'])){
            setcookie('fav_recp_len', $count, 0, '/');
        }else{
            $index = $_COOKIE['fav_recp_len'];
        }

        if (!isset($_COOKIE['fav_recp']) || !in_array($id, $_COOKIE['fav_recp'])){ 
            
            $cookie_name = 'fav_recp['.$index.']';
            setcookie($cookie_name, $id, 0, '/');
            $index += 1;
            setcookie('fav_recp_len', $index, 0, '/');
            $count = $index;
        }
    }

    echo "My Favourite Receipes (".$count.")";
?>