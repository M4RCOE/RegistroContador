<?php 
    include('conexion.php');

    $datos = array(
        'nombre' => $_POST['nombre'],
        'tiempo' => $_POST['tiempo'],
        'fecha' => $_POST['fecha'],
        'tiempoinicial' => $_POST['tiempoinicial'],
        'tiempofinal' => $_POST['tiempofinal']
    );

    if($datos['nombre']!=""&&$datos['tiempo']!=""&&$datos['tiempofinal']!=""){
        $update = "UPDATE contador SET tiempo='".$datos['tiempo']."', tiempofinal='".$datos['tiempofinal']."'";
        $condicion = " WHERE nombre='".$datos['nombre']."' ORDER BY tiempoinicial DESC LIMIT 1";
     
        $sql = $update.$condicion;
        
        if (($result = mysqli_query($conn, $sql)) === false) {
            die(mysqli_error($conn));
        }
    }
    
    $conn->close();
?>