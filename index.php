<?php
include_once 'app/Views/header.php';

$path = $_SERVER["REQUEST_URI"];

if ($path === "/qREST-API-FORMULA1/") {
    echo "Voici la page d'accueil";
}
elseif ($path === "/REST-API-FORMULA1/circuits") {
    require_once('app/Controllers/CircuitsController.php');
    $circuitsController = new CircuitsController();
    $circuitsController->show();
} elseif ($path === "/REST-API-FORMULA1/drivers") {
    require_once('app/Controllers/DriversController.php');
    $driversController = new DriversController();
    $driversController->show();
} elseif ($path === "/REST-API-FORMULA1/teams") {
    require_once('app/Controllers/TeamsController.php');
    $teamsController = new TeamsController();
    $teamsController->show();
} else {
    echo "Route not Found";
}
?>

</body>
</html>