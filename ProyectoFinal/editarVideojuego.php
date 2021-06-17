<?php
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["plataforma"]) || 
	!isset($_POST["genero"]) || 
	!isset($_POST["clasificacion"]) || 
	!isset($_POST["compania"]) || 
	!isset($_POST["id"])
) exit();

include_once "partials/database.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$plataforma = $_POST["plataforma"];
$genero = $_POST["genero"];
$clasificacion = $_POST["clasificacion"];
$compania = $_POST["compania"];

$sql = $conn->prepare("UPDATE videojuego SET nombre = ?, plataforma = ?, genero = ?, clasificacion = ?, compania = ? WHERE id = ?;");
$result = $sql->execute([$nombre, $plataforma, $genero, $clasificacion, $compania, $id]); # Pasar en el mismo orden de los '?' para validar
if($result === TRUE) echo "Cambios guardados";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
?>

<a href="tabla.php">Regresar</a>