<meta http-equiv="refresh" content="5; url=home">

<?php

    session_start();

    $_SESSION["user_log"] = true;

    include("loader.html");
    include("progressbar.html");

    $_SESSION["user_id"] = $_POST["email"];

?>