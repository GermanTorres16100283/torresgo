<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "partials/database.php";
$sql = $conn->prepare("SELECT * FROM videojuego WHERE id = ?;"); #de igual forma se hace asi para evitar una inyeccion sql
$sql->execute([$id]);
$dato = $sql->fetch(PDO::FETCH_OBJ);
if($dato === FALSE){
	echo "¡No existen datos relacionados con ese ID!";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Videojuego</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <main class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <h2>Editar Datos del Videojuego</h2>
                    <form action="editarVideojuego.php" method="post">
                        <!-- Ocultamos el ID para que el usuario no pueda cambiarlo, ya que solo se autoincrementa, pero aun es requerido para el momento de cambiar otros datos -->
                        <input type="hidden" name="id" value="<?php echo $dato->id; ?>">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre"
                                value="<?php echo $dato->nombre ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="plataforma" class="form-control" placeholder="Plataforma"
                                value="<?php echo $dato->plataforma ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="genero" class="form-control" placeholder="Género"
                                value="<?php echo $dato->genero ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="clasificacion" class="form-control" placeholder="Clasificación"
                                value="<?php echo $dato->clasificacion ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="compania" class="form-control" placeholder="Compañía"
                                value="<?php echo $dato->compania ?>">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success btn-block" name="editar" value="Guardar Cambios">
                    </form>
                    <br>
                    <form action="tabla.php">
                        <input type="submit" class="btn btn-primary btn-block" value="regresar">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <img src="assets/edit.webp" style="width: 75%;" alt="">
            </div>
        </div>
    </main>

</body>

</html>