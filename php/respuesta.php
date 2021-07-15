<?php 
    include('conexion.php');

    $datos = array(
        'nombre' => $_POST['nombre'],
        'tiempo' => $_POST['tiempo'],
        'fecha' => $_POST['fecha'],
        'tiempoinicial' => $_POST['tiempoinicial'],
        'tiempofinal' => $_POST['tiempofinal']
    );

    if($datos['nombre']!="" && $datos['fecha']!="" && $datos['tiempoinicial']!=""){
        $insert = "INSERT INTO contador (";
        $values = " VALUES (";
     
        foreach ( $_POST as $key => $value ) {
            $insert .= "$key, ";
            $values .= " '$value', ";
        }
     
        $insert = substr($insert, 0, -2).')';
        $values = substr($values, 0, -2).')';
     
        $sql = $insert.$values; 
        
        if (($result = mysqli_query($conn, $sql)) === false) {
            die(mysqli_error($conn));
        }
    }

    $conn->close();
    
?>