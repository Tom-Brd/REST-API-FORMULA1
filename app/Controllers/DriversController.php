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
}