<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=immo', 'root', '');
    $sqlState = $pdo->prepare('DELETE FROM client WHERE id_client=?');
    $sqlState->execute([$id]);
    header('location: listerc.php');
    ?>
</body>

</html>