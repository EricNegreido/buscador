<?php
  $updatename = $_GET["updatename"];
  $updatelastName = $_GET["updatelast_name"];
  $updatedni = $_GET["updatedni"];
  $updateage = $_GET["updateage"];
  $criterio = $_GET["criterio"];

    require("connection.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

    if(mysqli_connect_errno()){
      echo "Fallo al conectar con la BBDD";
      exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encuetra la BDD");
    mysqli_set_charset($conexion, "utf8");
    $consulta = "UPDATE persons SET name = '$updatename', last_name='$updatelastName', dni = '$updatedni', age = '$updateage' where name='$criterio' ";

    $resultado = mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
    if($resultado){
      echo "se a completado exitosamente";
    }else{
      echo "tuvo un error";
    }
?>