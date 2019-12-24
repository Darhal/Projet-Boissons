<?php
    include ('Donnees.inc.php');
    //if(file_get_contents("lock.txt") == "unlocked"){
        // no lock present, so place one
        //file_put_contents("lock.txt", "locked");
  
        /*$db_path = "../../../database/recepies.db";
        $db = new SQLite3($db_path);
        $db->exec("CREATE TABLE IF NOT EXISTS Recipes(id INT PRIMARY KEY, titre TEXT, ingredients TEXT preparation TEXT, aliment TEXT FOREIGN KEY);");

        $db->exec("CREATE TABLE IF NOT EXISTS SousCategory(titre TEXT PRIMARY KEY, upperCategory INT FOREIGN KEY REFERENCES Category(titre));");
        $db->exec("CREATE TABLE IF NOT EXISTS Category(titre TEXT PRIMARY KEY, upperCategory INT FOREIGN KEY REFERENCES SuperCategory(titre));");
        $db->exec("CREATE TABLE IF NOT EXISTS SuperCategory(titre TEXT PRIMARY KEY);");
        */
        // Init recepies:
        $AlimentToRecette = array();
        foreach($Recettes as $key => $tab){
            foreach($tab['index'] as $i => $aliment){
                if (!array_key_exists($aliment, $AlimentToRecette)){
                    $AlimentToRecette[$aliment] = array();
                }
                array_push($AlimentToRecette[$aliment], $key);
                //$values = "'".$key."','".$tab['titre']."', '".$tab['ingredients']."', '".$tab['preparation']."', '".$aliment."')";
                //$db->exec("INSERT OR IGNORE INTO Recipes(id, titre, ingredients, preparation, aliment) VALUES($values);");
            }
        }

        // Init Hierachie:
        $HirTree = array("SuperCat" => array(), "Category" => array(), "SousCat" => array());
        foreach ($Hierarchie as $cat_name => $tab){
            if (!array_key_exists("super-categorie", $tab)){ // super cat
                array_push($HirTree["SuperCat"], $cat_name);
                //$db->exec("INSERT OR IGNORE INTO SuperCategory(titre) VALUES ('$super_cat');");
            }else if (!array_key_exists("sous-categorie", $tab)){ // sous cat
                foreach($tab["super-categorie"] as $super_cat){
                    if (!array_key_exists($super_cat, $HirTree["SousCat"])){
                        $HirTree["SousCat"][$super_cat] = array();
                    }

                    //$db->exec("INSERT OR IGNORE INTO SousCategory(titre, upperCategory) VALUES ('$cat_name', '$super_cat');");
                    array_push($HirTree["SousCat"][$super_cat], $cat_name);
                }
            }else{ // cat
                foreach($tab["super-categorie"] as $super_cat){
                    if (!array_key_exists($super_cat, $HirTree["Category"])){
                        $HirTree["Category"][$super_cat] = array();
                    }
                    //$db->exec("INSERT OR IGNORE INTO Category(titre, upperCategory) VALUES ('$cat_name', '$super_cat');");
                    array_push($HirTree["Category"][$super_cat], $cat_name);
                }
            }
        }
        // remove the lock
        //file_put_contents("lock.txt", "unlocked", LOCK_EX);
    //}
?>