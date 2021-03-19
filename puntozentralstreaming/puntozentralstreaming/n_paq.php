<?php
  require 'conexion.php';
  $id_cliente = $_GET['id_cliente'];
    $sql = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
  $resultado = $mysqli->query($sql);
  $row = $resultado->fetch_array(MYSQLI_ASSOC);
  $nombre= $row['nombre']." ".$row['ap']." ".$row['am'];
  
?>
<!DOCTYPE html>
<html>
  <head>
        <link  rel="icon" href="logos/logocen.png" type="image/png"/>
    <title>Nueva venta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
  </head>
<style>

html,body{
  height:120%;
  width: 100%;
  font-family: 'Josefin Sans', sans-serif;
  background-image: url("logos/fondo4.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
* {
  box-sizing: border-box;
}
.container {
  position: absolute;
  right: 0;
  width: 1000px;
  padding: 16px;
  background-color: white;
  margin-top: 10%;
  margin-right: 150px;
}

input {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input:focus {
  background-color: #ddd;
  outline: none;
}
select{
   width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1; 
}
select :focus{
    background-color: #ddd;
  outline: none;
}
</style>
<body>
    
  <?php
  include("navegacionc.php");
  include("conexion.php")
  ?>
  <form class="container" method="POST" action="g_venta.php" enctype="multipart/form-data" autocomplete="off">
<div class="form-group">
          <label for="id_cliente" class="col-sm-2 control-label">Cliente</label>
          <br>
          <label><?php echo $nombre?></label>
          <input type='hidden' name='id_cliente' id='id_cliente'required value='<?php echo $id_cliente?>'>
          </div>
          <br>
          <label for="id_curso" class="col-sm-2 control-label">Curso</label>
          <div class="col-sm-10">
              <select name='id_curso' id="id_curso">
                <option value="0" required>Seleccione:</option>
                <?php
                  $query = $mysqli -> query ("SELECT * FROM curso where estado ='1' ORDER BY nombre ASC ;");
                  while ($valores = mysqli_fetch_array($query)) {
                    $nc=$valores['nombre'];
                    echo '<option value="'.$valores[id_curso].'">'.$nc.'</option>';
                  }
                ?>
              </select>
          </div>
          <label for="id_paquete" class="col-sm-2 control-label">Paquete</label>
          <div class="col-sm-10">
              <select name='id_paquete' id="id_paquete">
                <option value="0" required>Seleccione:</option>
                <?php
                  $query = $mysqli -> query ("SELECT * FROM paquete ORDER BY nombre ASC ;");
                  while ($valores = mysqli_fetch_array($query)) {
                    $np=$valores['nombre'];
                    echo '<option value="'.$valores[id_paquete].'">'.$np.'</option>';
                  }
                ?>
              </select>
          </div>
          <label for="f_i" class="col-sm-2 control-label">Fecha de inicio</label>
          <div class="col-sm-10">
          <input type="date" class="form-control" id="f_i" name="f_i"  value="<?php echo date("Y-m-d");?>" required>
          </div>

          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          </div>

      </form>
    </div>
  </body>
</html>