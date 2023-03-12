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

