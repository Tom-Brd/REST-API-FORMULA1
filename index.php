<?php
include_once 'app/Views/header.php';

$path = $_SERVER["REQUEST_URI"];

if (isGetMethode()) {
    if (isPath("/")) {
        echo "Voici la page d'accueil";
        die();
    } elseif (isPath("circuits")) {
        require_once('app/Controllers/CircuitsController.php');
        $circuitsController = new CircuitsController();
        $circuitsController->show();
        die();
    } elseif (isPath("drivers")) {
        require_once('app/Controllers/DriversController.php');
        $driversController = new DriversController();
        $driversController->show();
        die();
    } elseif (isPath("teams")) {
        require_once('app/Controllers/TeamsController.php');
        $teamsController = new TeamsController();
        $teamsController->show();
        die();
    }
}

echo "Route not Found";
?>

</body>
</html>