<?php

include_once 'functions.php';
require_once 'app/Models/DriversModel.php';
require_once 'app/Views/DriversView.php';

class DriversController {
    public function show() {
        $db = database();
        $driverModel = new DriversModel($db);
        $drivers = $driverModel->getDrivers();
        $driverView = new DriversView($driverModel);
        $driverView->show($drivers);
    }

    public function showDriver(int $id) {
        $db = database();
        $driverModel = new DriversModel($db);
        $circuit = json_decode($driverModel->getDriver($id), true);
        $driverView = new DriversView($driverModel);
        $driverView->showDriver($circuit['id']);
    }
}