<?php

include_once 'functions.php';
require_once 'app/Models/CircuitsModel.php';
require_once 'app/Views/CircuitsView.php';

class CircuitsController {
    public function show() {
        $db = database();
        $circuitModel = new CircuitsModel($db);
        $circuits = $circuitModel->getCircuits();
        $circuitView = new CircuitsView($circuitModel);
        $circuitView->show($circuits);
    }

    public function showCircuit(int $id) {
        $db = database();
        $circuitModel = new CircuitsModel($db);
        $circuit = json_decode($circuitModel->getCircuit($id), true);
        $circuitView = new CircuitsView($circuitModel);
        $circuitView->showCircuit($circuit['id']);
    }
}