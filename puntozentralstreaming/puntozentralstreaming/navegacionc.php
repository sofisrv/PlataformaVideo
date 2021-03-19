<head><meta charset="gb18030">

</head>
<style>
<?php
header('Content-Type: text/html; charset=utf-8');  
@ob_start();
 require 'conexion.php';

 session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){
 
  $sql = "SELECT * FROM video";
  $result = $mysqli->query($sql);
  $vact = $result->num_rows; //total de videos actualment subidos
  $vmax= '10'; //maximo de videos que se pueden subir
?> 
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i');
html,body{
  margin:0;
  height:100%;
  font-family: 'Josefin Sans', sans-serif;

}
a{
  text-decoration:none
}
.header{
  position:fixed;
  overflow:hidden;
  display:flex;
  flex-wrap: wrap;
  width: 100%;
  color:#eee;
  background-color: black;
}
.header:before{
  content:"";
  width:100%;
  height:200%;
  position:absolute;
  top:0;
  left:0;
  background-color: black;
  /*background:#1B2030 url("logos/fondo1.jpg") 50% 0 no-repeat;*/
  background-size:100%;
  background-attachment:fixed;
  transition:all 4s ease-in-out;
  z-index:-2



}
.header a{
  color:#eee;
}
.menu{
  display:block;
  width:50px;
  height:50px;
  border:2px solid #fff;
  border-radius:3px;
  position:absolute;
  right:25px;
  top:25px;
  text-decoration:none
}
.menu:after{
  content:"";
  display:block;
  width:20px;
  height:3px;
  background:#fff;
  position:absolute;
  margin:0 auto;
  top:5px;
  left:0;
  right:0;
  box-shadow:0 8px, 0 16px
}
.boton{
  border:2px solid #fff;
  border-radius:3px;
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  align-content:center;
  margin-top: 25px;
  padding:0px 10px;
  font-weight: 900;
  font-size:1.1em;
  line-height:1;
  box-sizing:border-box;
  height:50px;
}
.cap{
  text-decoration:none;
  display:inline-flex;
  align-items:center;
  align-content:center;
  margin-top: 25px;
  padding:0px 10px;
  font-weight: 900;
  font-size:1.1em;
  line-height:1;
  box-sizing:border-box;
  height:50px;
}
.sides{
  margin-right: 50px;
}
.author{
  display:inline-block;
  width:60px;
  height:60px;
  border-radius:50%;
  background:url("logos/lp1.png") center no-repeat;
  background-size:cover;
  margin-top:20px;
  border:2px solid #fff;
  border-radius:3px;
  border-radius: 60px;
}
</style>

<div class="header">
  <div class="sides">
     <a href="" class="cap"><?php echo $vact?> / <?php echo $vmax?></a>
     <a href="t_clientes.php" class="boton">Clientes</a>
     <a href="t_cursos.php" class="boton">Cursos</a>
     <a href="t_videos.php" class="boton">Videos</a>
     <a href="t_paquetes.php" class="boton">Paquetes</a>
     <a href="t_paqs.php" class="boton">Venta de paquetes</a>
     <a href="t_usuarios.php" class="boton">Usuarios</a>
     <!--<a href="" class="boton">Configuración</a>-->
  </div>

  <div class="sides"> 
    <a href="cerrarsesion.php" class="author"></a>
     <a><?php echo $_SESSION['username'];?></a>

  </div>
</div>
<?php
}else{
  echo "INICIA SESIÓN PARA PODER ACCEDER";
   header('Location: logina.php');
?>
<?php 
  
}?>