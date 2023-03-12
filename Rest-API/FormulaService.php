<?php
include_once 'functions.php';

class FormulaService {

    private $db;

    public function __construct()
    {
        $this->db = database();
    }

    public function getDrivers()
    {
        require_once 'Response/DriverEntity.php';
        $drivers = $this->db->query("SELECT * FROM drivers");
        $dbResult = $drivers->fetchAll();
        $driversArray = [];
        foreach ($dbResult as $driverEntity) {
            $team = $this->getDriverTeam($driverEntity['team_id']);
            $driversArray[] = new DriverEntity($driverEntity['id'], $driverEntity['name'], $driverEntity['nationality'], $driverEntity['date_of_birth'], $team, $driverEntity['car_number']);
        }
        return json_encode($driversArray);
    }

    public function getDriver(int $id) {
        require_once 'Response/DriverEntity.php';
        $driver = $this->db->prepare("SELECT * FROM drivers WHERE id=:id");
        $driver->execute([
            'id'=>$id
        ]);
        $dbResult = $driver->fetch();
        $team = $this->getDriverTeam($dbResult['team_id']);
        return json_encode(new DriverEntity($dbResult['id'], $dbResult['name'], $dbResult['nationality'], $dbResult['date_of_birth'], $team, $dbResult['car_number']));
    }

    public function getDriverTeam(int $id)
    {
        $team = $this->db->prepare("SELECT name FROM teams WHERE id=:id");
        $team->execute([
            'id' => $id
        ]);
        return $team->fetch()['name'];
    }

    public function getCircuits()
    {
        require_once 'Response/CircuitEntity.php';
        $circuits = $this->db->query("SELECT * FROM circuits");
        $dbResult = $circuits->fetchAll();
        $circuitsArray = [];
        foreach ($dbResult as $circuitEntity) {
            $circuitsArray[] = new CircuitEntity($circuitEntity['id'], $circuitEntity['name'], $circuitEntity['country'], $circuitEntity['length'], $circuitEntity['number_of_turns']);
        }
        return json_encode($circuitsArray);
    }

    public function getCircuit($id)
    {
        require_once 'Response/CircuitEntity.php';
        $circuit = $this->db->prepare("SELECT * FROM circuits WHERE id=:id");
        $circuit->execute([
            'id'=>$id
        ]);
        $dbResult = $circuit->fetch();
        return json_encode(new CircuitEntity($dbResult['id'], $dbResult['name'], $dbResult['country'], $dbResult['length'], $dbResult['number_of_turns']));
    }

    public function getTeams()
    {
        require_once 'Response/TeamEntity.php';
        $teams = $this->db->query("SELECT * FROM teams");
        $dbResult = $teams->fetchAll();
        $teamsArray = [];
        foreach ($dbResult as $teamEntity) {
            $teamsArray[] = new TeamEntity($teamEntity['id'], $teamEntity['name'], $teamEntity['country'], $teamEntity['team_principal'], $teamEntity['year_of_creation']);
        }
        return json_encode($teamsArray);
    }

    public function getTeam($id)
    {
        require_once 'Response/TeamEntity.php';
        $team = $this->db->prepare("SELECT * FROM teams WHERE id=:id");
        $team->execute([
            'id'=>$id
        ]);
        $dbResult = $team->fetch();
        return json_encode(new TeamEntity($dbResult['id'], $dbResult['name'], $dbResult['country'], $dbResult['team_principal'], $dbResult['year_of_creation']));
    }

    public function createDriver(array $requestDto) {
        $driver = $this->db->prepare("INSERT INTO drivers
            (name, nationality, date_of_birth, team_id, car_number)
            VALUES (:name, :nationality, :date_of_birth, :team_id, :car_number)");
        $driver->execute([
            'name'=>$requestDto['name'],
            'nationality'=>$requestDto['nationality'],
            'date_of_birth'=>$requestDto['date_of_birth'],
            'team_id'=>$requestDto['team_id'],
            'car_number'=>$requestDto['car_number']
        ]);
    }

    public function createCircuit(array $requestDto) {
        $circuit = $this->db->prepare("INSERT INTO circuits
            (name, country, length, number_of_turns)
            VALUES (:name, :country, :length, :number_of_turns)");
        $circuit->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'length'=>$requestDto['length'],
            'number_of_turns'=>$requestDto['number_of_turns']
        ]);
    }

    public function createTeam(array $requestDto) {
        $circuit = $this->db->prepare("INSERT INTO teams
            (name, country, team_principal, year_of_creation)
            VALUES (:name, :country, :team_principal, :year_of_creation)");
        $circuit->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'team_principal'=>$requestDto['team_principal'],
            'year_of_creation'=>$requestDto['year_of_creation']
        ]);
    }

    public function deleteDriver(int $id) {
        $deleteDriver = $this->db->prepare("DELETE FROM drivers WHERE id=:id");
        $deleteDriver->execute([
            'id'=>$id
        ]);
    }

    public function updateDriver(int $id, array $requestDto) {
        $updateDriver = $this->db->prepare("UPDATE drivers SET 
               name=:name, nationality=:nationality, date_of_birth=:date_of_birth, team_id=:team_id, car_number=:car_number WHERE id=:id");
        $updateDriver->execute([
            'name'=>$requestDto['name'],
            'nationality'=>$requestDto['nationality'],
            'date_of_birth'=>$requestDto['date_of_birth'],
            'team_id'=>$requestDto['team_id'],
            'car_number'=>$requestDto['car_number'],
            'id'=>$id
        ]);
    }

    public function updateCircuit(int $id, array $requestDto) {
        $updateDriver = $this->db->prepare("UPDATE circuits SET 
               name=:name, country=:country, length=:length, number_of_turns=:number_of_turns WHERE id=:id");
        $updateDriver->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'length'=>$requestDto['length'],
            'number_of_turns'=>$requestDto['number_of_turns'],
            'id'=>$id
        ]);
    }

    public function updateTeam(int $id, array $requestDto) {
        $updateDriver = $this->db->prepare("UPDATE teams SET 
               name=:name, country=:country, team_principal=:team_principal, year_of_creation=:year_of_creation WHERE id=:id");
        $updateDriver->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'team_principal'=>$requestDto['team_principal'],
            'year_of_creation'=>$requestDto['year_of_creation'],
            'id'=>$id
        ]);
    }

}

