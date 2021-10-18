<?php session_start(); 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PWD', '');
    define('DBNAME', 'conciergerie');

    try {
        $db = new PDO("mysql:host=". HOST .";dbname=". DBNAME, USER, PWD, [
            // Gestion des erreurs PHP/SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            // Gestion du jeu de caractères
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            // Choix du retours des résultats
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        // echo 'Base de données connectée';

    } catch (Exception $error) {
        echo 'Exception error : '. "<br>". $error->getMessage();
    }
    ?>