<?php
  require_once('crud_paquete.php');
  require_once('clase_paquete.php');
  $crud=new CrudPaquete();
  $paquetes= new Paquete();
  $paquetes=$crud->obtenerPaquete($_GET['id_paquete']);
?>

<!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Modificar Paquete</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
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
  ?>
<form action='administrar_paquete.php' method='post' class="container" autocomplete="off">
      <h1>Modificar Paquete</h1>
       <br>
        <table >
          <tr>
          <input type='hidden' name='id' required value='<?php echo $paquetes->getid_paquete()?>'>
          <label>Nombre</label>
          <input type='text' name='nombre' required value='<?php echo $paquetes->getnombre()?>'>
          <br>
          <label>Descripción</label>
          <input type='text' name='descripcion' required value='<?php echo $paquetes->getdescripcion()?>'>
          <br>  
          <label>Costo</label>
          <input type='number' name='costo' required value='<?php echo $paquetes->getcosto()?>'>
          <br>  
          <label>Estado</label>
          <select name="estado">
                  <option value="1" <?php if($paquetes->getestado()=='1'){ echo 'selected';}?> >Viible</option> 
                  <option value="2" <?php if($paquetes->getestado()=='2'){ echo 'selected';}?> >Invisble</option>
          </select>
          <br>
          <label>Caducidad</label>
          <input type='number' name='caducidad' required value='<?php echo $paquetes->getcaducidad()?>'>
          <br> 
          <label>Venta en linea</label>
          <select name="visibleonline">
                  <option value="1" <?php if($paquetes->getvisibleonline()=='1'){ echo 'selected';}?>>Si</option> 
                  <option value="2" <?php if($paquetes->getvisibleonline()=='2'){ echo 'selected';}?>>No</option>
          </select>
          <br>
        </table>
        <input type='hidden' name='actualizar' value='actualizar'>
          <br>
          <button type="submit" class="btn">Modificar</button>
          </form>
    </div>
  </div>
</body>
</html>