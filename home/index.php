<?php

require_once("function.php");

include("../Medoo.php");
    
    
         
// Using Medoo namespace.

use Medoo\Medoo;
 
$database = new Medoo([
    // [required]
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 's5418_terminkalender',
    'username' => 's5418_terminkalender',
    'password' => 'y0qz7D85!',
 
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


    session_start();

    if(isset($_SESSION["user_log"]) && $_SESSION["user_log"] == true){

    }else{
        header("location: ../?page=login");
    }

    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case "home"   : include("home.php");break;
            case "remove" : termin_remove();break;
            case "edit"   : edit_termin();include("edit.html");break;
            case "add"    : add_termin();include("add.html");break;
            default       : include("home.php");
        }
    }else{
        include("home.php");
    }

?>