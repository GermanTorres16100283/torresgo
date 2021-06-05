<?php
    session_start();

    if (isset($_SESSION['id_User'])) {
        header('Location: /LoginDB');
    }

    require 'database.php';

    if (!empty($_POST['user']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT idUser, user, password FROM users WHERE user=:user');
        $records->bindParam(':user', $_POST['user']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['id_User'] = $results['idUser'];
            header('Location: index.php');
        } else {
            $message = 'Credenciales no coinciden, favor de verificar.';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>

<body>
    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar Sesión</h1>
    <span>o <a href="signup.php">Signup</a></span>

    <form action="login.php" method="post">
        <input type="text" name="user" placeholder="Ingrese su usuario...">
        <input type="password" name="password" placeholder="Ingrese su contraseña...">
        <input type="submit" value="Submit">
    </form>
</body>

</html>