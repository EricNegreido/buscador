<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php  require("pagina_busqueda.php")?>
    <?php  require("add_register.php")?>
    <?php  require("busqueda_update.php")?>

</head>
<body>
  <?php 
  $mibusqueda = $_GET["buscar"];
  $actualizar = $_GET["actualizar"];


  $mipag = $_SERVER["PHP_SELF"];

  if($mibusqueda!=NULL){
    search($mibusqueda);
  }else if($actualizar!=NULL){
    search_update($actualizar);
  }else{
    echo('<form action="' . $mipag .'" method="get">
      <label for="buscar">Buscar: 
        <input type="text" name="buscar">
      </label>
      <input type="submit" name="enviar" value="Enviar">
      </form>');
      echo('<form action="' . $mipag .'" method="get">
      <label for="buscar">Buscar: 
        <input type="text" name="actualizar">
      </label>
      <input type="submit" name="enviar" value="Actualizar">
      </form>');
  }

  $addName = $_GET["name"];
  
  if($addName!=""){
    $addLastName = $_GET["lastName"];
    $addDni = $_GET["dni"];
    $addAge = $_GET["age"];
    addRegister($addName, $addLastName, $addDni, $addAge);
  }else{
    echo('<form action="' . $mipag .'" method="get">
      <label for="name">Nombre: 
        <input type="text" name="name" required>
      </label>
      <label for="lastName">Apellido: 
        <input type="text" name="lastName" required>
      </label>
      <label for="dni">: 
        <input type="number" name="dni" required>
      </label>
      <label for="age">: 
        <input type="number" name="age">
      </label>
      <input type="submit" name="enviar" value="Enviar">
      </form>');
  }
  
  ?>
    
</body>
</html>