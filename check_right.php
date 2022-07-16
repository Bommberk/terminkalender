<meta http-equiv="refresh" content="2; url=home">

<?php

    session_start();

    $_SESSION["user_log"] = true;
    include("loader.html");

    $_SESSION["user_id"] = $_POST["email"];


?>