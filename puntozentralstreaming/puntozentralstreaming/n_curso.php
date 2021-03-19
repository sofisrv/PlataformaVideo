<!DOCTYPE html>
<html>
  <head>
        <link  rel="icon" href="logos/logocen.png" type="image/png"/>
    <title>Nuevo Curso</title>
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
<body>
    
  <?php
  include("navegacionc.php");
  ?>
  <form class="container" method="POST" action="g_curso.php" enctype="multipart/form-data" autocomplete="off">
<div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="archivo" class="col-sm-2 control-label">Archivo</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
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