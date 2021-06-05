<?php
    session_start();

    require 'database.php';

    if (isset($_SESSION['id_User'])) {
        $records = $conn->prepare('SELECT idUser, user, password FROM users Where idUser = :id');
        $records->bindParam(':id', $_SESSION['id_User']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>LoginDB</title>
</head>

<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
    <br>Bienvenido <?= $user['user'] ?>
    <br>Has iniciado sesión correctamente.
    <a href="logout.php">Logout</a>
    <?php else: ?>
    <h1>Por favor inicie sesion o da de alta su usuario</h1>

    <a href="login.php">Login</a> or <a href="signup.php">Signup</a>
    <?php endif; ?>
</body>

</html>