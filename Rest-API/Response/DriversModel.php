<?php

class DriversModel
{
    private $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDrivers()
    {
        $drivers = $this->db->query("SELECT * FROM drivers");
        return json_encode($drivers->fetchAll());
    }

    public function getDriver(int $id) {
        $driver = $this->db->prepare("SELECT * FROM drivers WHERE id=:id");
        $driver->execute([
            'id'=>$id
        ]);
        return json_encode($driver->fetch());
    }

    public function getDriverTeam(int $id)
    {
        $team = $this->db->prepare("SELECT name FROM teams WHERE id=:id");
        $team->execute([
            'id' => $id
        ]);

        return json_encode($team->fetch()['name']);
    }
}