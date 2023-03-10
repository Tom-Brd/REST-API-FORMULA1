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
        $drivers = $this->model->getDrivers();
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
                $team = $db->prepare("SELECT name FROM teams WHERE id=:id");
                $team->execute([
                    'id'=>$driver['team_id']
                ]);
                $resultTeam = $team->fetch()['name'];
                ?>
                <tr>
                    <td><?= $driver['name']?></td>
                    <td><?= $driver['nationality']?></td>
                    <td><?= $driver['date_of_birth']?></td>
                    <td><?= $resultTeam?></td>
                    <td><?= $driver['car_number']?></td>
                </tr>
            <?php }
            ?>
        </table>
<?php
    }
}
?>