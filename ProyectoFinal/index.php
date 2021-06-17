<?php
    session_start();
    require 'partials/database.php';

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, user, password FROM usuario Where id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <title>Inicio</title>
</head>
<body>

    <?php if(!empty($user)): ?>
    <link rel="stylesheet" href="assets/style.css">
    <h1>Prueba de CRUD o ABC de una base de datos</h1>
    <br>
    <p>Bienvenido <?= $user['user'] ?></p>
    <br>
    <a href="tabla.php">Base de datos</a>
    <p></p>
    <a href="logout.php">Logout</a>
    
    <?php else: ?>
        <link rel="stylesheet" href="assets/style.css">
        <?php require 'partials/header.php' ?>

        <h1>Bienvenido. Inicie sesion o crea una nueva cuenta de usuario.</h1>
        <a href="login.php">Login</a> o <a href="signup.php">signup</a>
    <?php endif; ?>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>