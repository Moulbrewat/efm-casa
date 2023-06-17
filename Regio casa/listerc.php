<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lister Client</title>
</head>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=immo', 'root', '');
$sqlState = $pdo->query('SELECT * FROM client');
$datas = $sqlState->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <a href="ajouter.php"><input type="submit" value="Ajouter"></a>
    <a href="listelocation.php"><input type="submit" value="Listelocation"></a>
    <a href="connexion.php"><input type="submit" value="Connexion"></a>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Cin</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Email</td>
                <td>Password</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td><?= $data->id_client ?></td>
                    <td><?= $data->cin ?></td>
                    <td><?= $data->nom ?></td>
                    <td><?= $data->prenom ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->password ?></td>
                    <td><a href="supprimer.php?id=<?php echo $data->id_client ?>" onclick="return confirm('voulez vous vraimment supprimer cette element')"><input type="submit" name="supprimer" value="supprimer"></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>