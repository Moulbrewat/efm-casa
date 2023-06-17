<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // $date1 = $date2 = '';
    if (isset($_POST['choisir'])) {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
    }
    $pdo = new PDO('mysql:hos=localhost;dbname=immo', 'root', '');
    $sqlState = $pdo->prepare('SELECT * FROM location 
    INNER JOIN client ON client.id_client = location.id_client
    INNER JOIN immobilier ON immobilier.id_immobilier= location.id_immobilier
    WHERE date_debut_location > ? AND date_fin_location < ?
    ');
    $sqlState->execute([$date1, $date2]);
    $locations = $sqlState->fetchAll(PDO::FETCH_OBJ);
    ?>
    <form method="POST">
        <input type="date" name="date1">
        <input type="date" name="date2">
        <input type="submit" name="choisir" value="Choisir">
    </form>
    <table>
        <thead>
            <tr>
                <td>Client</td>
                <td>Titre</td>
                <td>Date debut</td>
                <td>Date fin</td>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($locations as $location) {
            ?>
                <tr>
                    <td><?= $location->nom ?></td>
                    <td><?= $location->titre ?></td>
                    <td><?= $location->date_debut_location ?></td>
                    <td><?= $location->date_fin_location ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>