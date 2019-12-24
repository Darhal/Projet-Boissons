<?php
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

    session_start();
    include("../../database/database.php");
    $id = $_POST["recepie_id"];
    $count = 0;

    if(isset($_SESSION["username"])) {
        $res = $db->query("SELECT recette_id FROM FavouriteRecipes WHERE username = '".$_SESSION["username"]."';");
        $my_list = array();

        while ($row = $res->fetchArray(1)){
            array_push($my_list, $row["recette_id"]);
            $count += 1;
        }
        
        if (in_array($id, $my_list)){
            $db->exec("DELETE FROM FavouriteRecipes WHERE recette_id = $id;");
            $count -= 1;
        }
    }else{
        if (!isset($_COOKIE['fav_recp_len'])){
            echo "My Favourite Receipes (".$count.")";
            exit();
        }

        $rec_ids = array();
        if (isset($_COOKIE['fav_recp']) && in_array($id, $_COOKIE['fav_recp'])){
            foreach($_COOKIE['fav_recp'] as $rid){
                if ($rid != $id){
                    array_push($rec_ids, $rid);
                }
            }
            DeleteCookies();

            foreach($rec_ids as $index => $rid) {
                $cookie_name = 'fav_recp['.$index.']';
                setcookie($cookie_name, $rid, 0, '/');
                $count += 1;
            }
            setcookie('fav_recp_len', $count, 0, '/');
        }
    }

    echo "My Favourite Receipes (".$count.")";
?>