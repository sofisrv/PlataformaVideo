<!DOCTYPE html>
<html>
<head><meta charset="gb18030">
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Cursos</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<style>
html,body{
  height: 100%;
  width: 100%;
  font-family: 'Josefin Sans', sans-serif;

}
* {
  box-sizing: border-box;
}
.bg-img {
  background-image: url("logos/fondo4.jpg");
  height: 100%;
  background-position: center;
  background-repeat: repeat-x;
  background-size: cover;
  position: relative;
}
</style>

<body oncontextmenu="return false" onkeydown="return false">

<div class="bg-img">
  <?php
  include("navegacioncliente.php");
  ?>
    </div>
</body>

</html>

