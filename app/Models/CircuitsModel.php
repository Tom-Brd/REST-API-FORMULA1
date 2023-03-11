<?php

class CircuitsModel {
    private $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCircuits() {
        $circuits = $this->db->query("SELECT * FROM circuits");
        return json_encode($circuits->fetchAll());
    }

}