<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?Php
    if (isset($_POST['connexion'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($email) && !empty($password)) {
            $pdo = new PDO('mysql:host=localhost;dbname=immo', 'root', '');
            $sqlState = $pdo->prepare('SELECT * FROM client WHERE email=? AND password=? ');
            $sqlState->execute([$email, $password]);
            if ($sqlState->rowCount() >= 1) {
                session_start();
                $_SESSION['user'] = $sqlState->fetch(PDO::FETCH_OBJ);
                header('location: locationsencours.php');
            } else {
                echo "Informations incorrect";
            }
        } else {
            echo "tous les champs sont obligatoire";
        }
    }
    ?>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email"><br>
        <label>Password</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Connexion" name="connexion">
    </form>
</body>

</html>