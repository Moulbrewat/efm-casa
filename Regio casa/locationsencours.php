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
    session_start();
    echo $_SESSION['user']->nom . " " . $_SESSION['user']->prenom;

    $id = $_SESSION['user']->id_client;

    $pdo = new PDO('mysql:host=localhost;dbname=immo', 'root', '');
    $sqlState = $pdo->prepare('SELECT * FROM location 
    INNER JOIN client ON client.id_client = location.id_client
    INNER JOIN immobilier ON immobilier.id_immobilier = location.id_immobilier
    WHERE client.id_client = ? AND date_fin_location > CURDATE()
     ');
    $sqlState->execute([$id]);
    $locations = $sqlState->fetchAll(PDO::FETCH_OBJ);
    ?>

    <a href="deconnexion.php">Deconnexion</a>
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