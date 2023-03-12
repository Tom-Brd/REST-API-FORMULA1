<?php

class CircuitEntity
{
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

}