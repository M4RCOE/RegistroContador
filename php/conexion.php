<?php 
    $servername = "localhost";
    $database = "bd_contador";
    $username = "root";
    $password = "";
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        echo "Error: No se pudo conectar a MySQL. Error " . mysqli_connect_errno() . " : ". mysqli_connect_error() . PHP_EOL;
        die;
    }
?>