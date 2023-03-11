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

    public function getCircuit(int $id) {
        $circuit = $this->db->prepare("SELECT * FROM circuits WHERE id=:id");
        $circuit->execute([
            'id'=>$id
        ]);
        return json_encode($circuit->fetch());
    }

}