<html>
<head>
  <title>Programando Ando</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

    <center><h1>Formulario</h1></center>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      <label for="doc">Matricula </label>
      <input type="text" name="mat" class="form-control" id="mat">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="dir">Grado y grupo </label>
        <input type="text" name="gg" class="form-control" id="gg">
    </div>

    <div class="form-group">
        <label for="tel">Corrreo </label>
        <input type="text" name="cor" class="form-control" id="cor">
    </div>

    <div class="form-group">
        <label for="tel">Contraseña </label>
        <input type="text" name="con" class="form-control" id="con">
    </div>

    <div class="form-group">
        <label for="tel">Mensaje </label>
        <input type="text" name="men" class="form-control" id="men">
    </div>
    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("abrir_conexion.php");
      
      $mat    ="";
      $nombre ="";
      $gg    ="";
      $cor    ="";
      $con    ="";
      $men    ="";

        if(isset($_POST['btn_consultar']))
      {   
        $mat = $_POST['mat'];
        $existe=0;

        if($mat=="")
      {
        echo "Los campos son obligatorios";
      }
      else
      {
               //CONSULTAR
  $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE mat = '$mat'");
  while($consulta = mysqli_fetch_array($resultados))
  {
    echo $consulta['mat']."<br>";
    echo $consulta['nombre']."<br>";
    echo $consulta['gg']."<br>";
    echo $consulta['cor']."<br>";
    echo $consulta['con']."<br>";
    echo $consulta['men']."<br>";
    $existe++;

  }
  if($existe==0){echo "El documento no existe";}
    }
      }
      if(isset($_POST['btn_registrar']))
      {
        $mat = $_POST['mat'];
        $nombre = $_POST['nombre'];
        $gg = $_POST['gg'];
        $cor = $_POST['cor'];
        $con = $_POST['con'];
        $men = $_POST['men'];

        if($mat=="")
       {
        echo "El campo es obligatorio";
       }
      else
       {
  //INSERTAR
  mysqli_query($conexion, "INSERT INTO $tabla_db1 
  (mat,nombre,gg,cor,con,men) 
    values 
  ('$mat','$nombre', '$gg','$cor','$con','$men')");
       }
      }
      if(isset($_POST['btn_eliminar']))
      {
        $mat = $_POST['mat'];
        $existe=0;

        if($mat=="")
      {
        echo "Los campos son obligatorios";
      }

  else
  {
      //ELIMINAR
  $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE mat = '$mat'";
  mysqli_query($conexion,$_DELETE_SQL); 
  }
    }
      
  ?>

  </div>


<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div> 
</body>
</html>