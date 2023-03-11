<?php
include_once 'app/Views/header.php';

$path = $_SERVER["REQUEST_URI"];

if (isGetMethode()) {
    if (isPath("/")) {
        echo "Voici la page d'accueil";
        die();
    } elseif (isPath("show/circuits")) {
        require_once('app/Controllers/CircuitsController.php');
        $circuitsController = new CircuitsController();
        $circuitsController->show();
        die();
    } elseif (isPath("show/circuits/:circuit")) {
        $id = extractPathParam();
        var_dump($id);
        require_once('app/Controllers/CircuitsController.php');
        $circuitController = new CircuitsController();
        $circuitController->showCircuit(intval($id));
        die();
    } elseif (isPath("show/drivers")) {
        require_once('app/Controllers/DriversController.php');
        $driversController = new DriversController();
        $driversController->show();
        die();
    }  elseif (isPath("show/drivers/:driver")) {
        $id = extractPathParam();
        var_dump($id);
        require_once('app/Controllers/DriversController.php');
        $driverController = new DriversController();
        $driverController->showDriver(intval($id));
        die();
    } elseif (isPath("show/teams")) {
        require_once('app/Controllers/TeamsController.php');
        $teamsController = new TeamsController();
        $teamsController->show();
        die();
    }  elseif (isPath("show/teams/:teams")) {
        $id = extractPathParam();
        var_dump($id);
        require_once('app/Controllers/TeamsController.php');
        $teamController = new TeamsController();
        $teamController->showTeam(intval($id));
        die();
    }
}

echo "Route not Found";
?>

</body>
</html>