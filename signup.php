<?php 
    require 'database.php';

    $message = '';

    if (!empty($_POST['user']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (user, password) VALUES (:user, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user',$_POST['user']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Usuario creado';
        } else {
            $message = 'Error al crear usuario, ingrese bien los valores';
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
    <title>Sistema Usuarios | Signup</title>
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Registro de Usuario</h1>
    <span>o <a href="login.php">Login</a></span>

    <form action="signup.php" method="post">
        <input type="text" name="user" placeholder="Ingrese su usuario">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Registrar">
    </form>
    
</body>
</html>