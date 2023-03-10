<?php

include_once 'functions.php';
require_once 'app/Models/TeamsModel.php';
require_once 'app/Views/TeamsView.php';

class TeamsController {
    public function show() {
        $db = database();
        $teamModel = new TeamsModel($db);
        $teams = $teamModel->getTeams();
        $teamsView = new TeamsView($teamModel);
        $teamsView->show($teams);
    }
}