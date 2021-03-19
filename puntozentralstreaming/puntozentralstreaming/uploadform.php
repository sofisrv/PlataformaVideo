<!DOCTYPE html>
<html>
  <head>
        <link  rel="icon" href="logos/logocen.png" type="image/png"/>
    <title>Nuevo Video</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
  </head>
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
<script>
/* Script written by Miguel Nunez @ minuvasoft10.com */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "s3-upload-via-form.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Cargado "+event.loaded+" bytes de "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% cargando... espere, no cierre esta ventana aun";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
<?php
  
  require 'conexion.php';
  $sql = "SELECT * FROM video";
  $result = $mysqli->query($sql);
  $vact = $result->num_rows; //total de videos actualment subidos
  $vmax= '10';
  if($vmax<=$vact)
  {
    header('Location: vmax.php');
  }else{
?>



<body>
    
  <?php
  include("navegacionc.php");
  include("conexion.php")
  ?>
  <form class="container" action="s3-upload-via-form.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <!--<form class="container" method="POST" action="g_video.php" enctype="multipart/form-data" autocomplete="off">-->
<div class="form-group">
          <label><b>FORMATOS PERMITIDOS:</b> MP4</label>
          <BR>
          <label>Maximo 1GB</label>
          <BR>
          <br>
          <label for="id_curso" class="col-sm-2 control-label">Grupo</label>
          <div class="col-sm-10">
              <select name='id_curso' id="id_curso">
                <option value="0">Seleccione:</option>
                <?php
                  $query = $mysqli -> query ("SELECT * FROM curso WHERE estado='1'");
                  while ($valores = mysqli_fetch_array($query)) {
                    $n=$valores[nombre];
                    echo '<option value="'.$valores[id_curso].'">'.$n.'</option>';
                  }
                ?>
              </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="Titulo" class="col-sm-2 control-label">Titulo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="video" class="col-sm-2 control-label">Video</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="file1" name="file1" accept="video/mp4" required>
          </div>
        </div>
        <div class="form-group">
          <label for="f_a" class="col-sm-2 control-label">Programar Fecha de publicación (tus clientes no verán este video hasta esta fecha)</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="f_a" name="f_a"  value="<?php echo date("Y-m-d");?>" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>

<?php } ?>