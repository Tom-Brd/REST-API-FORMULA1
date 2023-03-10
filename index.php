<?php
    include_once 'functions.php';

    $path = $_SERVER["REQUEST_URI"];


    $db = database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/main.css">
    <title>Formula 1 API</title>
</head>
<body>

<?php
if (isGetMethode()) {
    if ($path === "/REST-API-FORMULA1/drivers") {
        $drivers = $db->query("SELECT * FROM drivers");
        $resultDriver = $drivers->fetchAll();
?>
<h1>Formula 1 API</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Nationality</th>
        <th>Date of birth</th>
        <th>Team</th>
        <th>Car number</th>
    </tr>
    <?php
    foreach ($resultDriver as $driver) {
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

    if ($path === "/REST-API-FORMULA1/teams") {
        $teams = $db->query("SELECT * FROM teams");
        $resultTeams = $teams->fetchAll();
?>
<h1>Formula 1 API</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Country</th>
        <th>Team principal</th>
        <th>Year of Creation</th>
    </tr>
    <?php
    foreach ($resultTeams as $team) {
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
    if ($path === "/REST-API-FORMULA1/circuits") {
        $circuits = $db->query("SELECT * FROM circuits");
        $resultCircuits = $circuits->fetchAll();
    ?>
    <h1>Formula 1 API</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Country</th>
            <th>Lenght</th>
            <th>Number of turns</th>
        </tr>
        <?php
    foreach ($resultCircuits as $circuit) {
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


</body>
</html>