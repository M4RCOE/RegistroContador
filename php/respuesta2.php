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
    
?>