<?php
require_once('crud_video.php');
require_once('clase_video.php');
$crud=new Crudvideo();
$videos= new Video();
$listaVideos=$crud->mostrarvideosa($_GET['id_curso']);
$id=$_GET['id_curso'];
include ('bucket.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Videos</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<style>
html,body{
    height:120%;
  width: 100%;
  font-family: 'Josefin Sans', sans-serif;

}
* {
  box-sizing: border-box;
}
.users{
  display:inline-block;
  width:40px;
  height:40px;
  background:url("logos/personas.png") center no-repeat;
  background-size:cover;
}
.eliminar{
  display:inline-block;
  width:40px;
  height:40px;
  background:url("logos/delete.png") center no-repeat;
  background-size:cover;
}
.ver1{
  display:inline-block;
  width:40px;
  height:40px;
  background:url("logos/ver.png") center no-repeat;
  background-size:cover;
}
</style>
<body oncontextmenu="return false" onkeydown="return false">
  <?php
  include("navegacionc.php");
    include("conexion.php")
  ?>

<br>
<br>
<br>
<br>
<br>
  <?php
  $query = $mysqli -> query ("SELECT * FROM curso WHERE id_curso= $id");
  while ($valores = mysqli_fetch_array($query)) {
    $n=$valores['nombre'];
  }
?>
<div class="filtros">
  <label> VIDEOS DE EL GRUPO <b><?php echo $n?> </b> </label>
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:35%;"><h2>Titulo</h2></th>
          <th style="width:40%;"><h4>Video</h4></th>
          <th style="width:15%;"><h4>Fecha de alta</h4></th>
          <th style="width:5%;"></th>
          <th style="width:5%;"></th>
        </tr>
        <tbody>
          <?php foreach ($listaVideos as $videos) {?>
            <?php 
                  $id_video = $videos->getid_video();
                  $titulo= $videos->gettitulo(); 
                  $video= $videos->getvideo(); 
                  $f_a= $videos->getf_a(); 
                  $id_curso= $videos->getid_curso(); 
                  $keyname = $centro.'/'.$video;
                  $URL = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyname;

            ?>
              <tr>
                <td><b><?php echo $titulo?></b></td>
                <td><video src="<?php echo $URL?>" class="imgcurso" controlslist="nodownload"></td>
                  <td><b><?php echo $f_a?></b></td>
                  <td><a ><button class="ver1"  OnClick="location.href='v_video.php?id_video=<?php echo $id_video?>'"></button></a></td>
                <td><a ><button class="eliminar"  OnClick="location.href='administrar_video.php?id_video=<?php echo $id_video?>&accion=e'"></button></a></td>
              </tr>
              <?php }?>
            </tbody>
        </tbody>
        </table>
      </div>
    </div>
</body>

</html>