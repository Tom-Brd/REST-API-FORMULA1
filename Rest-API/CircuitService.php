<?php
include_once 'functions.php';

class CircuitService {

    private $db;

    public function __construct()
    {
        $this->db = database();
    }

    public function getCircuits()
    {
        require_once 'Response/CircuitResponse.php';
        $circuits = $this->db->query("SELECT * FROM circuits");
        $dbResult = $circuits->fetchAll();

        if (handleDbFailure($dbResult)) {
            return '';
        }

        $circuitsArray = [];
        foreach ($dbResult as $circuitEntity) {
            $circuitsArray[] = new CircuitResponse($circuitEntity['id'], $circuitEntity['name'], $circuitEntity['country'], $circuitEntity['length'], $circuitEntity['number_of_turns']);
        }
        return json_encode($circuitsArray);
    }

    public function getCircuit($id)
    {
        require_once 'Response/CircuitResponse.php';
        $circuit = $this->db->prepare("SELECT * FROM circuits WHERE id=:id");
        $circuit->execute([
            'id'=>$id
        ]);
        $dbResult = $circuit->fetch();

        if (handleDbFailure($dbResult)) {
            return '';
        }

        return json_encode(new CircuitResponse($dbResult['id'], $dbResult['name'], $dbResult['country'], $dbResult['length'], $dbResult['number_of_turns']));
    }

    public function createCircuit(array $requestDto) {
        $circuit = $this->db->prepare("INSERT INTO circuits
            (name, country, length, number_of_turns)
            VALUES (:name, :country, :length, :number_of_turns)");
        $createCircuitQuery = $circuit->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'length'=>$requestDto['length'],
            'number_of_turns'=>$requestDto['number_of_turns']
        ]);

        if (handleDbFailure($createCircuitQuery)) {
            return '';
        }
    }

    public function updateCircuit(int $id, array $requestDto) {
        $updateCircuit = $this->db->prepare("UPDATE circuits SET 
               name=:name, country=:country, length=:length, number_of_turns=:number_of_turns WHERE id=:id");
        $updateCircuitQuery = $updateCircuit->execute([
            'name'=>$requestDto['name'],
            'country'=>$requestDto['country'],
            'length'=>$requestDto['length'],
            'number_of_turns'=>$requestDto['number_of_turns'],
            'id'=>$id
        ]);

        if (handleDbFailure($updateCircuitQuery)) {
            return '';
        }
    }

    public function deleteCircuit(int $id) {
        $deleteCircuit = $this->db->prepare("DELETE FROM circuits WHERE id=:id");
        $deleteCircuitQuery = $deleteCircuit->execute([
            'id'=>$id
        ]);

        if (handleDbFailure($deleteCircuitQuery)) {
            return '';
        }
    }
}