<?php

class TeamEntity implements JsonSerializable {
    private $id;
    private $name;
    private $country;
    private $teamPrincipal;
    private $yearOfCreation;

    /**
     * @param $id
     * @param $name
     * @param $country
     * @param $teamPrincipal
     * @param $yearOfCreation
     */
    public function __construct($id, $name, $country, $teamPrincipal, $yearOfCreation)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->teamPrincipal = $teamPrincipal;
        $this->yearOfCreation = $yearOfCreation;
    }

    public function jsonSerialize() :mixed {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'teamPrincipal' => $this->teamPrincipal,
            'yearOfCreation' => $this->yearOfCreation
        ];
    }
}