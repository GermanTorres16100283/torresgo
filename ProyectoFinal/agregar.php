<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Videojuego</title>
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
                    <h2>Registrar Videojuego</h2>
                    <form action="agregarVideojuego.php" method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" name="plataforma" class="form-control" placeholder="Plataforma">
                        </div>
                        <div class="form-group">
                            <input type="text" name="genero" class="form-control" placeholder="Género">
                        </div>
                        <div class="form-group">
                            <input type="text" name="clasificacion" class="form-control" placeholder="Clasificación">
                        </div>
                        <div class="form-group">
                            <input type="text" name="compania" class="form-control" placeholder="Compañía">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success btn-block" name="agregar" value="Agregar">
                    </form>
                    <br>
                    <form action="tabla.php">
                        <input type="submit" class="btn btn-primary btn-block" value="Regresar">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <img src="assets/portada.jpg" style="width: 90%;" alt="">
            </div>
        </div>
    </main>

</body>

</html>