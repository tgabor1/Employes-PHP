<?php
try {
    session_start();
    // On se connecte à MySQL
    $bdd = new PDO("mysql:host=localhost;dbname=employesphp;charset=UTF8;", "root", "");
}
catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die("Une erreur de type:" . $e->getMessage());
}
?>