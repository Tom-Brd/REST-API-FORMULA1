<?php
include_once 'functions.php';

class DriverService {

    private $db;

    public function __construct()
    {
        $this->db = database();
    }

    public function getDrivers()
    {
        require_once 'Response/DriverResponse.php';
        $drivers = $this->db->query("SELECT * FROM drivers");
        $dbResult = $drivers->fetchAll();

        if (handleDbFailure($dbResult)) {
            return '';
        }

        $driversArray = [];
        foreach ($dbResult as $driverEntity) {
            $team = $this->getDriverTeam($driverEntity['team_id']);
            $driversArray[] = new DriverResponse($driverEntity['id'], $driverEntity['name'], $driverEntity['nationality'], $driverEntity['date_of_birth'], $team, $driverEntity['car_number']);
        }
        return json_encode($driversArray);
    }

    public function getDriver(int $id) {
        require_once 'Response/DriverResponse.php';
        $driver = $this->db->prepare("SELECT * FROM drivers WHERE id=:id");
        $driver->execute([
            'id'=>$id
        ]);
        $dbResult = $driver->fetch();

        if (handleDbFailure($dbResult)) {
            return '';
        }

        $team = $this->getDriverTeam($dbResult['team_id']);

        if (handleDbFailure($team)) {
            return '';
        }

        return json_encode(new DriverResponse($dbResult['id'], $dbResult['name'], $dbResult['nationality'], $dbResult['date_of_birth'], $team, $dbResult['car_number']));
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
        $createDriverQuery = $driver->execute([
            'name'=>$requestDto['name'],
            'nationality'=>$requestDto['nationality'],
            'date_of_birth'=>$requestDto['date_of_birth'],
            'team_id'=>$requestDto['team_id'],
            'car_number'=>$requestDto['car_number']
        ]);

        if (handleDbFailure($createDriverQuery)) {
            return '';
        }

    }

    public function deleteDriver(int $id) {
        $deleteDriver = $this->db->prepare("DELETE FROM drivers WHERE id=:id");
        $deleteDriverQuery = $deleteDriver->execute([
            'id'=>$id
        ]);

        if (handleDbFailure($deleteDriverQuery)) {
            return '';
        }
    }

    public function updateDriver(int $id, array $requestDto) {
        $updateDriver = $this->db->prepare("UPDATE drivers SET 
               name=:name, nationality=:nationality, date_of_birth=:date_of_birth, team_id=:team_id, car_number=:car_number WHERE id=:id");
        $updateDriverQuery = $updateDriver->execute([
            'name'=>$requestDto['name'],
            'nationality'=>$requestDto['nationality'],
            'date_of_birth'=>$requestDto['date_of_birth'],
            'team_id'=>$requestDto['team_id'],
            'car_number'=>$requestDto['car_number'],
            'id'=>$id
        ]);

        if (handleDbFailure($updateDriverQuery)) {
            return '';
        }

    }

}