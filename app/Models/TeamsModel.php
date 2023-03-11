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

    public function getTeam(int $id) {
        $team = $this->db->prepare("SELECT * FROM teams WHERE id=:id");
        $team->execute([
            'id'=>$id
        ]);
        return json_encode($team->fetch());
    }

}