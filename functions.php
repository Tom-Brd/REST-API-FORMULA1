<?php

function database(){
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=FORMULA1;port=8889", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur lors de la connexion à la base de données :  " . $e->getMessage());
    }
    return $pdo;
}