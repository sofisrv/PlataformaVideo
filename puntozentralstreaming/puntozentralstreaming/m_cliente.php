<?php
  require_once('crud_cliente.php');
  require_once('clase_cliente.php');
  $crud=new CrudCliente();
  $clientes= new Cliente();
  $clientes=$crud->obtenerCliente($_GET['id_cliente']);
?>

<!DOCTYPE html>
<html>
<head><meta charset="euc-jp">
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Modificar Cliente</title>
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
<form action='administrar_cliente.php' method='post' class="container" autocomplete="off">
      <h1>Modificar Cliente</h1>
       <br>
        <table >
          <tr>
          <input type='hidden' name='id' required value='<?php echo $clientes->getid_cliente()?>'>
          <label>Nombre</label>
          <input type='text' name='nombre' required value='<?php echo $clientes->getnombre()?>'>
          <br>
          <label>Apellido Paterno</label>
          <input type='text' name='ap' required value='<?php echo $clientes->getap()?>'>
          <br>  
          <label>Apellido Materno</label>
          <input type='text' name='am' value='<?php echo $clientes->getam()?>'>
          <br>
          <label>Correo</label>
          <input type='email' name='correo' required value='<?php echo $clientes->getcorreo()?>'>
          <br>
          <label>Cotraseña</label>
          <input type='password' name='contra' required value='<?php echo $clientes->getcontra()?>'>
          <br>
          <div class="form-group">
            <label for="estado" class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-10">
              <select class="form-control" id="estado" name="estado">
                <option value="1" <?php if($clientes->getestado()=='1') echo 'selected'; ?>>Visible</option>
                <option value="0" <?php if($clientes->getestado()=='2') echo 'selected'; ?>>Papelera</option>
              </select>
            </div>
          </div>
        </table>
        <input type='hidden' name='actualizar' value='actualizar'>
          <br>
          <button type="submit" class="btn">Modificar</button>
          </form>
    </div>
  </div>
</body>
</html>