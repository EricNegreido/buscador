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
    // $consulta = "INSERT INTO persons (name, last_name, dni, age) VALUES ('$name', '$lastName', $dni, $age)";
    // $resultado = mysqli_query($conexion, $consulta);

    // INSERTAR REGISTROS CON CONSULTAS PREPARADAS
  // 1°_creamos sentencia sql
    $sql = "INSERT INTO persons (name, last_name, dni, age) VALUES (?, ?, ?, ?)";
  // 2°_Preparo consulta
    $result = mysqli_prepare($conexion, $sql);
  // 3°_Unir parametros
    $success = mysqli_stmt_bind_param($result, "ssii", $name, $lastName, $dni, $age);
  // 4°_Ejecutar sql
    $execute = mysqli_stmt_execute($result);

    mysqli_close($conexion);
    if($result){
      echo "se a completado exitosamente";
    }else{
      echo "tuvo un error";
    }
  }
?>