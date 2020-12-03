<?php
// localhost
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "agenda";

try {
    $conexion = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
    // echo "Conexión exitosa";
}
catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}