<?php
// FORMULA RESOURCE ENDPOINTS

$path = $_SERVER["REQUEST_URI"];
include_once 'functions.php';
require_once 'Rest-API/FormulaService.php';

$formulaService = new FormulaService();


if (isPath("/")) {
    echo "Page d'accueil";
    die();
}

if (isPath("/drivers")) {
    if (isGetMethod()) {
        header("Content-Type: application/json");
        echo $formulaService->getDrivers();
    } else http_response_code(405);
    die();
}

if (isPath("/drivers/show/:driver")) {
    if (isGetMethod()) {
        $id = extractPathParam();
        header("Content-Type: application/json");
        echo $formulaService->getDriver($id);
    } else http_response_code(405);
    die();
}

if (isPath("/circuits")) {
    if (isGetMethod()) {
        header("Content-Type: application/json");
        echo $formulaService->getCircuits();
    } else http_response_code(405);
    die();
}

if (isPath("/circuits/show/:driver")) {
    if (isGetMethod()) {
        $id = extractPathParam();
        header("Content-Type: application/json");
        echo $formulaService->getCircuit($id);
    } else http_response_code(405);
    die();
}

if (isPath("/teams")) {
    if (isGetMethod()) {
        header("Content-Type: application/json");
        echo $formulaService->getTeams();
    } else http_response_code(405);
    die();
}

if (isPath("/teams/show/:driver")) {
    if (isGetMethod()) {
        $id = extractPathParam();
        header("Content-Type: application/json");
        echo $formulaService->getTeam($id);
    } else http_response_code(405);
    die();
}

if (isPath("/drivers/create")) {
    if (isPostMethod()) {
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $formulaService->createDriver($requestDto);
        echo "Driver created";
        die();
    } else http_response_code(405);
}

if (isPath("/circuits/create")) {
    if (isPostMethod()) {
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $formulaService->createCircuit($requestDto);
        echo "Circuit created";
        die();
    } else http_response_code(405);
}

if (isPath("/teams/create")) {
    if (isPostMethod()) {
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $formulaService->createTeam($requestDto);
        echo "Team created";
        die();
    } else http_response_code(405);
}

if (isPath("/drivers/delete/:delete")) {
    if (isDeleteMethod()) {
        $id = extractPathParam();
        $formulaService->deleteDriver($id);
        echo "Driver deleted";
        die();
    } else http_response_code(405);
}

if (isPath("/drivers/update/:update")) {
    if (isPatchMethod()) {
        $id = extractPathParam();
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $formulaService->updateDriver($id, $requestDto);
        echo "Driver updated";
        die();
    } else http_response_code(405);
}

if (isPath("/circuits/update/:update")) {
    if (isPatchMethod()) {
        $id = extractPathParam();
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $formulaService->updateCircuit($id, $requestDto);
        echo "Circuit updated";
        die();
    } else http_response_code(405);
}

if (isPath("/teams/update/:update")) {
    if (isPatchMethod()) {
        $id = extractPathParam();
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $formulaService->updateTeam($id, $requestDto);
        echo "Team updated";
        die();
    } else http_response_code(405);
}


/*
if (isGetMethod()) {

    if (isPath("show/circuits")) {
        require_once('app/Controllers/CircuitsController.php');
        $circuitsController = new CircuitsController();
        $circuitsController->show();
        die();
    } elseif (isPath("show/circuits/:circuit")) {
        $id = extractPathParam();
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
    }*/
echo "Route not Found";
http_response_code(404);

//}

