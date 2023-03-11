<?php

class DriversView {

    private $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function show() {
        $drivers = json_decode($this->model->getDrivers(), true);
        ?>
        <h1>Drivers</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Nationality</th>
                <th>Date of birth</th>
                <th>Team</th>
                <th>Car number</th>
            </tr>
            <?php
            foreach ($drivers as $driver) {
                $team = json_decode($this->model->getDriverTeam($driver['team_id']), true);
            ?>
            <tr>
                <td><?= $driver['name']?></td>
                <td><?= $driver['nationality']?></td>
                <td><?= $driver['date_of_birth']?></td>
                <td><?= $team?></td>
                <td><?= $driver['car_number']?></td>
            </tr>
        <?php }
        ?>
    </table>
<?php
    }
}
?>