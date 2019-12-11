<?php
    include ('../../Donnees.inc.php');
    if(file_get_contents("lock.txt") == "unlocked"){
        // no lock present, so place one
        file_put_contents("lock.txt", "locked");
  
        $db_path = "../../../database/users.db";
        $db = new SQLite3($db_path);
        $db->exec("CREATE TABLE IF NOT EXISTS Recipes(id INT PRIMARY KEY, titre TEXT, ingredients TEXT preparation TEXT, aliment TEXT FOREIGN KEY);");

        $db->exec("CREATE TABLE IF NOT EXISTS SousCategory(titre TEXT PRIMARY KEY");
        $db->exec("CREATE TABLE IF NOT EXISTS Category(titre TEXT PRIMARY KEY, upperCategory INT FOREIGN KEY REFERENCES SuperCategory(titre));");
        $db->exec("CREATE TABLE IF NOT EXISTS SuperCategory(titre TEXT PRIMARY KEY);");

        // Init recepies:
        foreach($Recettes as $key => $tab){
            foreach($tab['index'] as $i => $aliment){
                $values = "'".$key."','".$tab['titre']."', '".$tab['ingredients']."', '".$tab['preparation']."', '".$aliment."')";
                $db->exec("INSERT INTO Recipes(id, titre, ingredients, preparation, aliment) VALUES($values);");
            }
        }

        // Init Hierachie:
        $SuperCat = array();
        $Category = array();
        $SousCat = array();
        foreach ($Hierarchie as $cat_name => $tab){
            if (!array_key_exists("super-categorie", $tab)){ // super cat
                array_push($SuperCat, $cat_name);
            }else if (!array_key_exists("sous-categorie", $tab)){ // sous cat
                foreach($tab["super-categorie"] as $super_cat){
                    if (!array_key_exists($super_cat, $SousCat)){
                        $SousCat[$super_cat] = array();
                    }
                    
                    array_push($SousCat[$super_cat], $cat_name);
                }
            }else{ // cat
                foreach($tab["super-categorie"] as $super_cat){
                    if (!array_key_exists($super_cat, $Category)){
                        $Category[$super_cat] = array();
                    }

                    array_push($Category[$super_cat], $cat_name);
                }
            }
        }
        // remove the lock
        file_put_contents("lock.txt", "unlocked", LOCK_EX);
    }
?>