<?php
// FORMULA RESOURCE ENDPOINTS

$path = $_SERVER["REQUEST_URI"];
include_once 'functions.php';
require_once 'Rest-API/CircuitService.php';
require_once 'Rest-API/TeamService.php';
require_once 'Rest-API/DriverService.php';

$teamService = new TeamService();
$driverService = new DriverService();
$circuitService = new CircuitService();


if (isPath("/drivers")) {
    if (isGetMethod()) {
        header("Content-Type: application/json");
        echo $driverService->getDrivers();
    } else http_response_code(405);
    die();
}

if (isPath("/drivers/show/:driver")) {
    if (isGetMethod()) {
        $id = extractPathParam();
        header("Content-Type: application/json");
        echo $driverService->getDriver($id);
    } else http_response_code(405);
    die();
}

if (isPath("/drivers/create")) {
    if (isPostMethod()) {
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $driverService->createDriver($requestDto);
    } else http_response_code(405);
    die();
}

if (isPath("/drivers/delete/:driver")) {
    if (isDeleteMethod()) {
        $id = extractPathParam();
        $driverService->deleteDriver($id);
    } else http_response_code(405);
    die();
}

if (isPath("/drivers/update/:driver")) {
    if (isPatchMethod()) {
        $id = extractPathParam();
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $driverService->updateDriver($id, $requestDto);
    } else http_response_code(405);
    die();
}

if (isPath("/circuits")) {
    if (isGetMethod()) {
        header("Content-Type: application/json");
        echo $circuitService->getCircuits();
    } else http_response_code(405);
    die();
}

if (isPath("/circuits/show/:circuit")) {
    if (isGetMethod()) {
        $id = extractPathParam();
        header("Content-Type: application/json");
        echo $circuitService->getCircuit($id);
    } else http_response_code(405);
    die();
}

if (isPath("/circuits/create")) {
    if (isPostMethod()) {
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $circuitService->createCircuit($requestDto);
    } else http_response_code(405);
    die();
}

if (isPath("/circuits/delete/:circuit")) {
    if (isDeleteMethod()) {
        $id = extractPathParam();
        $circuitService->deleteCircuit($id);
    } else http_response_code(405);
    die();
}

if (isPath("/circuits/update/:circuit")) {
    if (isPatchMethod()) {
        $id = extractPathParam();
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $circuitService->updateCircuit($id, $requestDto);
    } else http_response_code(405);
    die();
}

if (isPath("/teams")) {
    if (isGetMethod()) {
        header("Content-Type: application/json");
        echo $teamService->getTeams();
    } else http_response_code(405);
    die();
}

if (isPath("/teams/show/:team")) {
    if (isGetMethod()) {
        $id = extractPathParam();
        header("Content-Type: application/json");
        echo $teamService->getTeam($id);
    } else http_response_code(405);
    die();
}

if (isPath("/teams/create")) {
    if (isPostMethod()) {
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $teamService->createTeam($requestDto);
    } else http_response_code(405);
    die();
}

if (isPath("/teams/delete/:team")) {
    if (isDeleteMethod()) {
        $id = extractPathParam();
        $teamService->deleteTeam($id);
    } else http_response_code(405);
    die();
}

if (isPath("/teams/update/:team")) {
    if (isPatchMethod()) {
        $id = extractPathParam();
        $requestBody = file_get_contents('php://input');
        $requestDto = json_decode($requestBody, true);
        $teamService->updateTeam($id, $requestDto);
    } else http_response_code(405);
    die();
}

echo "Route not Found";
http_response_code(404);

//}

