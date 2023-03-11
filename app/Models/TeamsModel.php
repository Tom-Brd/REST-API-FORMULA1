<?php

class TeamsModel {
    private $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTeams() {
        $teams = $this->db->query("SELECT * FROM teams");
        return json_encode($teams->fetchAll());
    }

}