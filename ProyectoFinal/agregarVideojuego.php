<?php
#Se sale en dado caso de que no exista alguno de los datos
if(!isset($_POST["nombre"]) || !isset($_POST["plataforma"]) || !isset($_POST["genero"]) 
   || !isset($_POST["clasificacion"]) || !isset($_POST["compania"])) exit();

include_once "partials/database.php";
$nombre = $_POST["nombre"];
$plataforma = $_POST["plataforma"];
$genero = $_POST["genero"];
$clasificacion = $_POST["clasificacion"];
$compania = $_POST["compania"];

$sentencia = $conn->prepare("INSERT INTO videojuego(nombre, plataforma, genero, clasificacion, compania) VALUES (?, ?, ?, ?, ?);"); #Esto evita que se haga un inyeccion sql
$resultado = $sentencia->execute([$nombre, $plataforma, $genero, $clasificacion, $compania]); # Pasar en el mismo orden de los ?

if($resultado === TRUE) echo "Videojuego agregado";
else echo "Algo salió mal. Por favor verifica que la tabla exista";

?>

<a href="tabla.php">Regresar</a>