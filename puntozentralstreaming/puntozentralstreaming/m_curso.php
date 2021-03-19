<?php
	require 'conexion.php';
	
	$id_curso = $_GET['id_curso'];
	
	$sql = "SELECT * FROM curso WHERE id_curso = '$id_curso'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<!DOCTYPE html>
<html>
<head>
	    <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Modificar Curso</title>
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
          <form class="container" method="POST" action="mod_curso.php" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" id="id_curso" name="id_curso" value="<?php echo $row['id_curso']; ?>" />

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']; ?>"  required>
					</div>
				</div>

				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="1" <?php if($row['estado']=='1') echo 'selected'; ?>>Disponible</option>
							<option value="2" <?php if($row['estado']=='2') echo 'selected'; ?>>Papelera</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Cambiar Imagen</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="archivo" name="archivo" required>
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









































































