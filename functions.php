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

function isGetMethod() {
    return $_SERVER["REQUEST_METHOD"] === "GET";
}

function isPostMethod() {
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function isPatchMethod() {
    return $_SERVER["REQUEST_METHOD"] === "PATCH";
}

function isDeleteMethod() {
    return $_SERVER["REQUEST_METHOD"] === "DELETE";
}

function isPath(string $route): bool {
    $path = $_SERVER['REQUEST_URI'];
    $pathSeparatorPattern = "#/#";

    $routeParts = preg_split($pathSeparatorPattern, str_replace( "REST-API-FORMULA1/",'',$route));
    $pathParts = preg_split($pathSeparatorPattern, str_replace( "REST-API-FORMULA1/",'',$path));

    if (count($routeParts) !== count($pathParts)) {
        return false;
    }

    foreach ($routeParts as $routePartIndex => $routePart) {
        $pathPart = $pathParts[$routePartIndex];

        if (str_starts_with($routePart, ":")) {
            continue;
        }

        if ($routePart !== $pathPart) {
            return false;
        }
    }

    return true;
}

function extractPathParam(): int {
    $path = $_SERVER['REQUEST_URI'];
    $pathParts = explode('/', trim($path, '/'));
    return intval($pathParts[count($pathParts)-1]);
}