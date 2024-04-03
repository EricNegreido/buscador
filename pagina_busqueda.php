<?php

  $busqueda= $_GET["buscar"];
  require("connection.php");
  // $conexion = new mysqli($db_host, $db_usuario, $db_contra,$db_nombre);

  // if($conexion -> connect_errno){
  //     die("Conexion fallida" . $conexion -> connect_errno);
  // }else{
  //     echo "conectado";
  // } 

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

  if(mysqli_connect_errno()){
    echo "Fallo al conectar con la BBDD";
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuetra la BDD");
  mysqli_set_charset($conexion, "utf8");
  $consulta = "SELECT * FROM datospersonales WHERE NOMBRE LIKE'%$busqueda%'";

  $resultado = mysqli_query($conexion, $consulta);

  // while ($fila = mysqli_fetch_row($resultado)){
  //   echo $fila[0] . " ";
  //   echo $fila[1] . " ";
  //   echo $fila[2] . "<br>";
  // };

  while ($fila = mysqli_fetch_assoc($resultado)){
    echo $fila["NIF"] . " ";
    echo $fila["NOMBRE"] . " ";
    echo $fila["APELLIDO"] . "<br>";
  };
  mysqli_close($conexion);
?>