<?php

class TeamsView {

    private $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function show() {
        $teams = $this->model->getTeams();
        ?>
        <h1>Teams</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Team principal</th>
                <th>Year of Creation</th>
            </tr>
            <?php
            foreach ($teams as $team) {
                ?>
                <tr>
                    <td><?= $team['name']?></td>
                    <td><?= $team['country']?></td>
                    <td><?= $team['team_principal']?></td>
                    <td><?= $team['year_of_creation']?></td>
                </tr>
            <?php }
            ?>
        </table>
<?php
    }
}
?>