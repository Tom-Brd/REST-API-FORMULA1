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

    public function showTeam(int $id) {
        $db = database();
        $teamModel = new TeamsModel($db);
        $team = json_decode($teamModel->getTeam($id), true);
        $teamView = new TeamsView($teamModel);
        $teamView->showTeam($team['id']);
    }
}