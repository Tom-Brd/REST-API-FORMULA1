<?php

class CircuitEntity implements JsonSerializable {
    private $id;
    private $name;
    private $country;
    private $length;
    private $numberOfTurns;

    /**
     * @param $id
     * @param $name
     * @param $country
     * @param $length
     * @param $numberOfTurns
     */
    public function __construct($id, $name, $country, $length, $numberOfTurns)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->length = $length;
        $this->numberOfTurns = $numberOfTurns;
    }

    public function jsonSerialize() :mixed {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'length' => $this->length,
            'numberOfTurns' => $this->numberOfTurns
        ];
    }

}