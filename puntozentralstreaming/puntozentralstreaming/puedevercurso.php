<?php
header('Content-Type: text/html; charset=utf-8');  
@ob_start();
  session_start();
  $puedever=1;
  $f_f="2020-01-01";
  $hoy = date("Y-m-d");
  $user= $_SESSION['username'];
  $query1 = $mysqli -> query ("SELECT id_cliente FROM cliente WHERE correo= '$user'");
  while ($valores = mysqli_fetch_array($query1)) {
    $id_cliente=$valores['id_cliente'];
    }
  $query2 = $mysqli -> query ("SELECT f_f FROM paquete_cliente WHERE id_curso= '$id' && id_cliente= '$id_cliente'");
  while ($valores = mysqli_fetch_array($query2)) {
    $f_f=$valores['f_f'];
    }
    if($hoy>$f_f){
    echo "no PUEDE";
    $puedever=0;
    }else if($hoy<$f_f){
           $query2 = $mysqli -> query ("SELECT f_i FROM paquete_cliente WHERE id_curso= '$id' && id_cliente= '$id_cliente'");
            while ($valores = mysqli_fetch_array($query2)) {
              $f_i=$valores['f_i'];
              } 
              if($hoy<$f_i){
                    $puedever=0;
              }else{
                    $puedever=1;
              }
    }
?>