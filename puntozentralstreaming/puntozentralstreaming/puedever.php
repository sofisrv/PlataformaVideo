<?php
  $puedever=1;
  session_start();
  $user= $_SESSION['username'];
  $query1 = $mysqli -> query ("SELECT id_cliente FROM cliente WHERE correo= '$user'");
  while ($valores = mysqli_fetch_array($query1)) {
    $id_cliente=$valores['id_cliente'];

    }
  $query2 = $mysqli -> query ("SELECT id_curso FROM video WHERE id_video= '$id_video'");
  while ($valores = mysqli_fetch_array($query2)) {
  $id_curso=$valores['id_curso'];
  }
  $query3 = $mysqli -> query ("SELECT f_f FROM paquete_cliente WHERE id_curso= '$id_curso'");
  if($query3==''){
    $puedever=0;
  } else{
    while ($valores = mysqli_fetch_array($query3)) {
    $f_f=$valores['f_f'];
    $hoy = date("Y-m-d");
    if($f_f>$hoy){
     $puedever=1;
    }
    }
  }

?>

