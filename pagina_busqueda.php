<?php
  function search($data){

        
    // $busqueda= $_GET["buscar"];
    require("connection.php");
    // $conexion = new mysqli($db_host, $db_usuario, $db_contra,$db_nombre);
    
    // if($conexion -> connect_errno){
        //     die("Conexion fallida" . $conexion -> connect_errno);
        // }else{
    //     echo "conectado";
  // }  

  $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
  
// con mysqli_real_escape_string evitamos la inyeccion de datos, esta funcion no permite caracteres indebidos
  // $mibusqueda = mysqli_real_escape_string($conexion, $data);

  if(mysqli_connect_errno()){
    echo "Fallo al conectar con la BBDD";
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuetra la BDD");
  mysqli_set_charset($conexion, "utf8");

// CONSULTA PREPARADA

// 1°_creamos sentencia sql
  $sql = "SELECT name, last_name, dni FROM persons WHERE name= ?";
// 2°_Preparo consulta
  $result = mysqli_prepare($conexion, $sql);
// 3°_Unir parametros
  $success = mysqli_stmt_bind_param($result, "s", $data);
// 4°_Ejecutar sql
  $execute = mysqli_stmt_execute($result);

  if($execute == false){
    echo "Error al ejecutar la consulta";
  }else{
// 5°_Ascociar variables
   $ok = mysqli_stmt_bind_result($result, $name, $last_name, $dni);
   echo "Personas encontradas: <br>";
   echo "nombre" . " " . "apellido" . " " . "dni" . "<br>";
   while(mysqli_stmt_fetch($result)){
    echo $name . " " . $last_name . " " . $dni . "<br>";
   }
   mysqli_stmt_close($result);
  }
// CONSULTA NORMAL
  // $consulta = "SELECT * FROM persons WHERE name LIKE'%$mibusqueda%'";

  $resultado = mysqli_query($conexion, $consulta);
  
  // while ($fila = mysqli_fetch_row($resultado)){
      //   echo $fila[0] . " ";
      //   echo $fila[1] . " ";
      //   echo $fila[2] . "<br>";
      // };
      
      while ($fila = mysqli_fetch_assoc($resultado)){
          echo $fila["dni"] . " ";
          echo $fila["name"] . " ";
          echo $fila["last_name"];
          echo $fila["age"] . "<br>";

          echo '<form action="eliminar_registro.php" method="post">;
          <input type="hidden" name="dni" value="' . $fila["dni"] . '">
          <input type="submit" name="DEL" value="Eliminar">
          </form>';
      mysqli_close($conexion);
    }
  }
?>