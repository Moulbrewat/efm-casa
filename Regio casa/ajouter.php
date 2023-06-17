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
    if (isset($_POST['ajouter'])) {
        $cin = $_POST['cin'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($cin) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($password)) {
            $pdo = new PDO('mysql:host=localhost;dbname=immo', 'root', '');
            $sqlState = $pdo->prepare('INSERT INTO client VALUES(null,?,?,?,?,?)');
            $sqlState->execute([$cin, $nom, $prenom, $email, $password]);
            header('location: listerc.php');
        } else {
            echo "tous les champs sont obligatoire";
        }
    }
    ?>

    <form method="POST">
        <label>Cin</label>
        <input type="text" name="cin"><br>
        <label>Nom</label>
        <input type="text" name="nom"><br>
        <label>Prenom</label>
        <input type="text" name="prenom"><br>
        <label>Email</label>
        <input type="text" name="email"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <input type="submit" name="ajouter" value="Ajouter">
    </form>
</body>

</html>