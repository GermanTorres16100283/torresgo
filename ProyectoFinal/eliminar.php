<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "partials/database.php";
$sql = $conn->prepare("DELETE FROM videojuego WHERE id = ?;");
$result = $sql->execute([$id]);

?>