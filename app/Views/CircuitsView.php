<?php

class CircuitsView {

    private $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function show() {
        $circuits = $this->model->getCircuits();
        ?>
        <h1>Circuits</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Lenght</th>
                <th>Number of turns</th>
            </tr>
            <?php
            foreach ($circuits as $circuit) {
                ?>
                <tr>
                    <td><?= $circuit['name']?></td>
                    <td><?= $circuit['country']?></td>
                    <td><?= $circuit['length']?></td>
                    <td><?= $circuit['number_of_turns']?></td>
                </tr>
            <?php }
            ?>
        </table>
<?php
    }
}
?>