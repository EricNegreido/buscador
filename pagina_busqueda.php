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

  if(mysqli_connect_errno()){
    echo "Fallo al conectar con la BBDD";
    exit();
  }

  mysqli_select_db($conexion, $db_nombre) or die("No se encuetra la BDD");
  mysqli_set_charset($conexion, "utf8");
  $consulta = "SELECT * FROM persons WHERE name LIKE'%$data%'";

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