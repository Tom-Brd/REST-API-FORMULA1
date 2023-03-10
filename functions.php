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

function isGetMethode() {
    return $_SERVER["REQUEST_METHOD"] === "GET";
}

function isPostMethode() {
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function isPutMethode() {
    return $_SERVER["REQUEST_METHOD"] === "PUT";
}

function isDeleteMethode() {
    return $_SERVER["REQUEST_METHOD"] === "DELETE";
}