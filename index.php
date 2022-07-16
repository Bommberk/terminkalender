<?php

    require_once("functions.php");

    include("Medoo.php");
    
    
         
    // Using Medoo namespace.
    
    use Medoo\Medoo;
     
    $database = new Medoo([
        // [required]
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'terminkalender',
        'username' => 'root',
        'password' => '',
     
        // [optional]
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'port' => 3306,
     
        // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
        'prefix' => '',
     
        // [optional] To enable logging. It is disabled by default for better performance.
        'logging' => true,
     
        // [optional]
        // Error mode
        // Error handling strategies when the error is occurred.
        // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
        // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
        'error' => PDO::ERRMODE_SILENT,
     
        // [optional]
        // The driver_option for connection.
        // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
        'option' => [
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ],
     
        // [optional] Medoo will execute those commands after the database is connected.
        'command' => [
            'SET SQL_MODE=ANSI_QUOTES'
        ]
    ]);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        
        <?php

// Abfrage welche seite (page)

session_start();


        if(isset($_GET["page"])){
            switch($_GET["page"]){
                case "welcome"  : include("willkommen.html");break;
                case "login"    : include("login.html");session_destroy();unset($_SESSION["user_log"]);break;
                case "register" : include("register.html");session_destroy();unset($_SESSION["user_log"]);break;
                case "logout"   : include("logout.php");break;
                default         : include("willkommen.html");
            }
        }else{
            include("willkommen.html");
        }


        // Regestrierung

        if(isset($_POST["eintrag"]) && $_POST["eintrag"] == 1){
            daten_eintrag();
        }
        
        // Login

        if(isset($_POST["login"]) && $_POST["login"] == 2){
            daten_check();
        }

        // Produkte im Shop anzeigen

        

    ?>


<script src="https://kit.fontawesome.com/350675982b.js" crossorigin="anonymous"></script>
    
</body>
</html>