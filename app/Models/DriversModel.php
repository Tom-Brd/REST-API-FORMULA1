<?php

class DriversModel {
    private $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDrivers() {
        $drivers = $this->db->query("SELECT * FROM drivers");
        return $drivers->fetchAll();
    }

}