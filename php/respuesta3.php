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

    
    $nombre = $_POST['nombre'];
        
    $sql = "SELECT fecha, tiempo FROM contador WHERE nombre='".$nombre."' ORDER BY fecha DESC LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo $sql."<br>";
        while($row = $result->fetch_assoc()) {
            echo "fecha: " . $row["fecha"]. " - tiempo: " . $row["tiempo"]."<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();

?>