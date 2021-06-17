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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1116ca9adb.js"></script>
    <title>Sistema | Tabla Videojuegos</title>
</head>
<script type="text/javascript">
    function confirmarEliminacion() {
        var respuesta = confirmar("Seguro de eliminar estos datos?");

        if(respuesta == true) {
            return true;
        }else {
            return false;
        }
    }
</script>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="tabla.php"><?= $user['user'] ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="agregar.php">Agregar Videojuego</a>
                <a class="nav-item nav-link active" href="logout.php">Logout<span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nombre</th>
                <th>Plataforma</th>
                <th>Género</th>
                <th>Clasificación</th>
                <th>Compañía</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <!-- Para mostrar datos de la tabla en la pagina -->
        <?php 
            $tabla = $conn->query("SELECT * FROM videojuego");
            $result = $tabla->fetchALL(PDO::FETCH_OBJ);
            //print_r($result);

            foreach($result as $dato) {
                ?>
        <tr>
            <td scope="row"><?php echo $dato->nombre; ?></td>
            <td><?php echo $dato->plataforma; ?></td>
            <td><?php echo $dato->genero; ?></td>
            <td><?php echo $dato->clasificacion; ?></td>
            <td><?php echo $dato->compania; ?></td>
            <td>
                <a href="<?php echo "editar.php?id=" . $dato->id?>" class="btn btn-warning">
                    <i class="fas fa-edit"></i>

                </a>
            </td>
            <td><a href="<?php echo "eliminar.php?id=" . $dato->id?>"><button class="btn btn-danger" onclick="return confirmarEliminacion()"><i class="fas fa-trash-alt"></i></button>
                </a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</body>

</html>