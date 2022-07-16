<?php

    // Daten eintrag (Regestrierung)

    function daten_eintrag(){

        global $database;


            if(isset($_POST["benutzername"]) && $_POST["benutzername"] != "" && isset($_POST["email"]) && $_POST["email"] != "" && isset($_POST["password"]) && $_POST["password"] != ""){

            $database->insert("logindaten", [
                "benutzername" => $_POST["benutzername"],
                "email" => $_POST["email"],
                "password" => $_POST["password"],
            ]);

                include("eintrag.php");
            
        }
        
    }

    // Eingetragene Datech überprüfen

    function daten_check(){

        global $database;

        if(isset($_POST["email"]) && $_POST["email"] != "" && isset($_POST["password"]) && $_POST["password"] != ""){

        $data = $database->select("logindaten",[
            "email",
            "password",
        ],["email" => $_POST["email"], "password" => $_POST["password"]]);

        $data = json_decode(json_encode($data));

        $zähler = count($data);

        if($zähler == 1){
            include("check_right.php");
        }else{
            include("check.html");
        }
        
    }
        
    }




?>