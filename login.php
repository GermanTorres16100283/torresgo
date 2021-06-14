<?php
    session_start();

    if (isset($_SESSION['id'])) {
        header('Location: /ProyectoFinal');
    }

    require 'database.php';

    if (!empty($_POST['user']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, user, password FROM users WHERE user=:user');
        $records->bindParam(':user', $_POST['user']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header('Location: index.php');
        } else {
            $message = 'Credenciales no coinciden, favor de verificar.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="partials/header.php">
    <title>Sistema Usuarios | Login</title>
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Inicio de Sesion</h1>
    <span>o <a href="signup.php">Signup</a></span>
    <form action="login.php" method="post">
        <input type="text" name="user" placeholder="Ingrese su usuario">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar">
    </form>
</body>
</html>