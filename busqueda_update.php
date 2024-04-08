<?php
  function search_update($data){

  require("connection.php");

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
          echo "<form action='update_register.php' method='get'>"; 
          echo "<input type='text' name='updatedni' value='" . $fila['dni'] . "'><br>";
          echo "<input type='text' name='updatename' value='" . $fila['name'] . "'><br>";
          echo "<input type='text' name='updatelast_name' value='" . $fila['last_name'] . "'><br>";
          echo "<input type='text' name='updateage' value='" . $fila['age'] . "'><br>";
          echo "<input type='hidden' name='criterio' value='" . $fila['name'] . "'><br>";
          echo "<input type='submit' name='enviando' value= 'Actualizar'>";
          echo "</form>";
    }
    mysqli_close($conexion);

  }
?>