<?php

    if(isset($_GET["page"]) && $_GET["page"] == "logout"){

        session_start();

        session_destroy();
        unset($_SESSION["user_log"]);
        header("location: ?page=login");

        echo "hallo";
    }

?>