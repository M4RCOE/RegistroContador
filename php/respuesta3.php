<?php 
    include('conexion.php');
    
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