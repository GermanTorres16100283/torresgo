<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'videojuegos';

    try {
        $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
    } catch (PDOException $e) {
        die('Conexión fallida: ' .$e->getMessage());
    }
?>