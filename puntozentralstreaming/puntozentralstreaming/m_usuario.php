<?php
  require_once('crud_usuario.php');
  require_once('clase_usuario.php');
  $crud=new CrudUsuario();
  $usuarios= new Usuario();
  $usuarios=$crud->obtenerUsuario($_GET['id_usuario']);
?>

<!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Modificar Usuario</title>
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
<form action='administrar_usuario.php' method='post' class="container" autocomplete="off">
      <h1>Modificar Usuario</h1>
       <br>
        <table >
          <tr>
          <input type='hidden' name='id' required value='<?php echo $usuarios->getid_usuario()?>'>
          <label>Nombre</label>
          <input type='text' name='nombre' required value='<?php echo $usuarios->getnombre()?>'>
          <br>
          <label>Contraseña</label>
          <input type='text' name='contra' required value='<?php echo $usuarios->getcontra()?>'>
          <br>  
          <label>Rol</label>
          <select name="rol">
                  <option value="1" <?php if($usuarios->getrol()=='1'){ echo 'selected';}?> >ADMINISTRADOR</option> 
                  <option value="2" <?php if($usuarios->getrol()=='2'){ echo 'selected';}?> >RECEPCION</option>
          </select>
          <br>
          <label>Estado</label>
          <select name="estado">
                  <option value="1" <?php if($usuarios->getestado()=='1'){ echo 'selected';}?> >Activo</option> 
                  <option value="2" <?php if($usuarios->getestado()=='2'){ echo 'selected';}?> >Bloqueado</option>
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