<?php 
    include('conexion.php');
    
    $nombre = $_POST['nombre'];
        
    $sql = "SELECT fecha, tiempo FROM contador WHERE nombre='".$nombre."' ORDER BY fecha DESC LIMIT 5";
    $result = $conn->query($sql);
    /* echo $sql."<br>"; */
    $nrow = 0;
    if ($result->num_rows > 0) {   
        while($row = $result->fetch_assoc()) {
            $todo[$nrow] = $row;
            $nrow = $nrow + 1; 
        }
        echo json_encode($todo);
    } else {
        echo "0 results";
    }
    $conn->close();

?>