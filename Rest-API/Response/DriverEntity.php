<?php

class DriverEntity implements JsonSerializable {
    private $id;
    private $name;
    private $nationality;
    private $dateOfBirth;
    private $teamName;
    private $carNumber;

    /**
     * @param $id
     * @param $name
     * @param $nationality
     * @param $dateOfBirth
     * @param $teamName
     * @param $carNumber
     */
    public function __construct($id, $name, $nationality, $dateOfBirth, $teamName, $carNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nationality = $nationality;
        $this->dateOfBirth = $dateOfBirth;
        $this->teamName = $teamName;
        $this->carNumber = $carNumber;
    }

    public function jsonSerialize() :mixed {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nationality' => $this->nationality,
            'dateOfBirth' => $this->dateOfBirth,
            'team_name' => $this->teamName,
            'carNumber' => $this->carNumber
        ];
    }

}