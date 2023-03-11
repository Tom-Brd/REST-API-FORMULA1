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

    public function getDriverTeam(int $id)
    {
        $team = $this->db->prepare("SELECT name FROM teams WHERE id=:id");
        $team->execute([
            'id' => $id
        ]);

        return json_encode($team->fetch()['name']);
    }
}