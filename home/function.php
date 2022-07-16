<?php

// Termin löschen

function termin_remove(){

        global $database;
    
        $database->delete("termine",[
            "id" => $_GET["id"],
        ]);

        header("location: /home");

    }

    // Termin hinzufügen

    function add_termin(){

        global $database;

        if(isset($_POST["name"]) && $_POST["name"] != "" && isset($_POST["zeit"]) && $_POST["zeit"] != "" && isset($_POST["thema"]) && $_POST["thema"] != ""){
            $database->insert("termine",[
                "name" => $_POST["name"],
                "zeit" => $_POST["zeit"],
                "thema" => $_POST["thema"],
                "user_id" => $_SESSION["user_id"],
            ]);
            
            header("location: /home");
        }

    }

    // Termin bearbeiten

    function edit_termin(){
        
        global $database;

        if(isset($_POST["name"]) && $_POST["name"] != "" && isset($_POST["zeit"]) && $_POST["zeit"] != ""){
            $database->update("termine",[
                "name" => $_POST["name"],
                "zeit" => $_POST["zeit"],
            ],["id[=]" => $_GET["id"]]);

            header("location: /home");
        }
    }

?>