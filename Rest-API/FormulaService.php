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

}

