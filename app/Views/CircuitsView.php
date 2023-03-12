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
        echo $this->model->getCircuits();
        /*$circuits = json_decode($this->model->getCircuits(), true);
        */?><!--
        <h1>Circuits</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Lenght</th>
                <th>Number of turns</th>
            </tr>
            <?php
/*            foreach ($circuits as $circuit) {
            */?>
            <tr>
                <td><?php /*= $circuit['name']*/?></td>
                <td><?php /*= $circuit['country']*/?></td>
                <td><?php /*= $circuit['length']*/?></td>
                <td><?php /*= $circuit['number_of_turns']*/?></td>
            </tr>
        <?php /*}
        */?>
    </table>-->
<?php
    }

    public function showCircuit(int $id) {
        $circuit = json_decode($this->model->getCircuit($id), true);
        echo $circuit['name'];
    }

}
?>