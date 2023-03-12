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
        header("Content-Type: application/json");
        return json_encode($circuits->fetchAll());
    }

    public function getCircuit(int $id) {
        $circuit = $this->db->prepare("SELECT * FROM circuits WHERE id=:id");
        $circuit->execute([
            'id'=>$id
        ]);
        header("Content-Type: application/json");
        return json_encode($circuit->fetch());
    }

}