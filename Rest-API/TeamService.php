<?php
include_once 'functions.php';

class TeamService {

    private $db;

    public function __construct()
    {
        $this->db = database();
    }

    public function getTeams()
    {
        require_once 'Response/TeamResponse.php';
        $teams = $this->db->query("SELECT * FROM teams");
        $dbResult = $teams->fetchAll();

        if (handleDbFailure($dbResult)) {
            return '';
        }

        $teamsArray = [];
        foreach ($dbResult as $teamEntity) {
            $teamsArray[] = new TeamResponse($teamEntity['id'], $teamEntity['name'], $teamEntity['country'], $teamEntity['team_principal'], $teamEntity['year_of_creation']);
        }
        return json_encode($teamsArray);
    }

    public function getTeam($id)
    {
        require_once 'Response/TeamResponse.php';
        $team = $this->db->prepare("SELECT * FROM teams WHERE id=:id");
        $team->execute([
            'id'=>$id
        ]);
        $dbResult = $team->fetch();

        if (handleDbFailure($dbResult)) {
            return '';
        }

        return json_encode(new TeamResponse($dbResult['id'], $dbResult['name'], $dbResult['country'], $dbResult['team_principal'], $dbResult['year_of_creation']));
    }

    public function createTeam(array $requestDto) {
        $team = $this->db->prepare("INSERT INTO teams
            (name, country, team_principal, year_of_creation)
            VALUES (:name, :country, :team_principal, :year_of_creation)");
        $createTeamQuery = $team->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'team_principal'=>$requestDto['team_principal'],
            'year_of_creation'=>$requestDto['year_of_creation']
        ]);

        if (handleDbFailure($createTeamQuery)) {
            return '';
        }
    }

    public function deleteTeam(int $id) {
        $deleteTeam = $this->db->prepare("DELETE FROM teams WHERE id=:id");
        $deleteTeamQuery = $deleteTeam->execute([
            'id'=>$id
        ]);

        if (handleDbFailure($deleteTeamQuery)) {
            return '';
        }
    }

    public function updateTeam(int $id, array $requestDto) {
        $updateCircuit = $this->db->prepare("UPDATE teams SET 
               name=:name, country=:country, team_principal=:team_principal, year_of_creation=:year_of_creation WHERE id=:id");
        $updateCircuitQuery = $updateCircuit->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'team_principal'=>$requestDto['team_principal'],
            'year_of_creation'=>$requestDto['year_of_creation'],
            'id'=>$id
        ]);

        if (handleDbFailure($updateCircuitQuery)) {
            return '';
        }
    }
}