<?php
include('conexion.php');

$nombre = $_POST["nombre"];
$ap = $_POST["ap"];
$am = $_POST["am"];
$correo = $_POST["correo"];
$contra = $_POST["contra"];
$estado= '1';

$nuevo_cliente=$mysqli -> query("select correo from cliente where correo='$correo'");
if(mysqli_num_rows($nuevo_cliente)>0)
{
echo "
<img src='logos/alerta.png'>
<br>
  <label> <b><h1>¡YA EXISTE UN CLIENTE CON ESTE CORREO!</h1></b> </label>
  <label> <b><h6>Pruebe iniciando sesión</h6></b> </label>
<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver a intentar</a></p>
";
}
else
{
$result = $mysqli -> query("insert into cliente (id_cliente,nombre,ap,am, correo, contra, estado) values (NULL,'$nombre','$ap','$am','$correo','$contra', '$estado')"); 
echo "
 <label> <b><h1>¡CREADO CON EXITO!</h1></b> </label>
 <label> <b><h6>Regrese e inicie sesión para comenzar a ver videos</h6></b> </label>}
 <p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Regresar a iniciar sesión</a></p>
 ";
} 
?>