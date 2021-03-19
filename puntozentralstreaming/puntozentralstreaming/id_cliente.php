<?php
$id_cliente=0;
  session_start();
  $user= $_SESSION['username'];
  $query1 = $mysqli -> query ("SELECT id_cliente FROM cliente WHERE correo= '$user'");
  while ($valores = mysqli_fetch_array($query1)) {
    $id_cliente=$valores['id_cliente'];
    }
?>
