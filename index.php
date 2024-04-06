<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php  require("pagina_busqueda.php")?>
    <?php  require("add_register.php")?>

</head>
<body>
  <?php 
  $mibusqueda = $_GET["buscar"];

  $mipag = $_SERVER["PHP_SELF"];

  if($mibusqueda!=NULL){
    search($mibusqueda);
  }else{
    echo('<form action="' . $mipag .'" method="get">
      <label for="buscar">Buscar: 
        <input type="text" name="buscar">
      </label>
      <input type="submit" name="enviar" value="Enviar">
      </form>');
  }

  $addName = $_GET["name"];
  

  $thisPage = $_SERVER["PHP_SELF"];

  if($addName!=""){
    $addLastName = $_GET["lastName"];
    $addDni = $_GET["dni"];
    $addAge = $_GET["age"];
    addRegister($addName, $addLastName, $addDni, $addAge);
  }else{
    echo('<form action="' . $thisPage .'" method="get">
      <label for="name">Nombre: 
        <input type="text" name="name" required>
      </label>
      <label for="lastName">Apellido: 
        <input type="text" name="lastName" required>
      </label>
      <label for="dni">: 
        <input type="number" name="dni">
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