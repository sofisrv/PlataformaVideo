<?php
header('Content-Type: text/html; charset=utf-8');  
@ob_start();
require_once('crud_video.php');
require_once('clase_video.php');
$crud=new Crudvideo();
$videos= new Video();
$listaVideos=$crud->mostrar();
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
<div class="filtros">
  <a href="n_video.php"><button class="btn">Nuevo</button></a>
<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar Video por titulo..." title="Buscar video">
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:25%;"><h2>Titulo</h2></th>
          <th style="width:20%;"><h4>Grupo</h4></th>
          <th style="width:30%;"><h4>Video</h4></th>
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
                  $query = $mysqli -> query ("SELECT * FROM curso WHERE id_curso='$id_curso'");
                  while ($valores = mysqli_fetch_array($query)) {
                    $ngrupo=$valores['nombre'];
                  }
                  $keyname = $centro.'/'.$video;
                  $URL = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyname;
            ?>
              <tr>
                <td><b><?php echo $titulo?></b></td>
                <td><?php echo $ngrupo?></td>
                <td><video src="<?php echo $URL?>" class="imgcurso" controlslist="nodownload"></td>
                <td><?php echo $f_a?></td>
                <td><a ><button class="ver1"  OnClick="location.href='v_video.php?id_video=<?php echo $id_video?>'"></button></a></td>
                <td><a ><button class="eliminar" OnClick="location.href='s3-delete.php?id_video=<?php echo $id_video?>'"></button></a></td>
              </tr>
              <?php }?>
            </tbody>
        </tbody>
        </table>
      </div>
    </div>
</body>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("filtro1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</html>