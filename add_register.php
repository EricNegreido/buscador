<?php
  function addRegister($name, $lastName, $dni, $age){
    require("connection.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

    if(mysqli_connect_errno()){
      echo "Fallo al conectar con la BBDD";
      exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuetra la BDD");
    mysqli_set_charset($conexion, "utf8");
    $consulta = "INSERT INTO persons (name, last_name, dni, age) VALUES ('$name', '$lastName', $dni, $age)";

    $resultado = mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    if($resultado){
      echo "se a completado exitosamente";
    }else{
      echo "tuvo un error";
    }
  }
?>