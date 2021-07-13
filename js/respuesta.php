<?php 
    $servername = "localhost";
    $database = "bd_contador";
    $username = "root";
    $password = "";
    $sql = "mysql:host=$servername;dbname=$database;";
    $dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    // Create connection

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        echo "Error: No se pudo conectar a MySQL. Error " . mysqli_connect_errno() . " : ". mysqli_connect_error() . PHP_EOL;
        die;
    }

    $datos = array(
        'nombre' => $_POST['nombre'],
        'tiempo' => $_POST['tiempo'],
        'fecha' => $_POST['fecha'],
        'tiempoinicial' => $_POST['tiempoinicial'],
        'tiempofinal' => $_POST['tiempofinal']
    );

    if($datos['nombre']!=""){
        $insert = "INSERT INTO contador (";
        $values = " VALUES (";
     
        foreach ( $_POST as $key => $value ) {
            $insert .= "$key, ";
            $values .= " '$value', ";
        }
     
        // Eliminar las ultimas comas y cerrar los parentesis
        $insert = substr($insert, 0, -2).')';
        $values = substr($values, 0, -2).')';
     
        $sql = $insert.$values; 
        echo $sql;
        
        if (($result = mysqli_query($conn, $sql)) === false) {
            echo 'no se pudo';
            die(mysqli_error($conn));
        }else{
            echo $result;
        }
    }
    
?>