<!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Nuevo Cliente</title>
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
<form action='g_cliente2.php' method='post' class="container" autocomplete="off">
    <table>
          <label>Nombre</label>
          <input type='text' name='nombre' required placeholder="Ingrese su(s) nombre(s)">
          <br>
          <label>Apellido Paterno</label>
          <input type='text' name='ap' required placeholder="Ingrese su apellido paterno">
          <br>  
          <label>Apellido Materno</label>
          <input type='text' name='am' placeholder="Ingrese su apellido materno">
          <br>
          <label>Correo</label>
          <input type='email' name='correo' required placeholder="Ingrese su email">
          <br>
          <label>Cotraseña</label>
          <input type='password' name='contra' required placeholder="Ingrese contraseña">
          <br>              
          <input type='hidden' name='insertar' value='insertar'>
          <br>
          <button type="submit" class="btn">Agregar</button>
    </table>
  </form>
</body>
</html>