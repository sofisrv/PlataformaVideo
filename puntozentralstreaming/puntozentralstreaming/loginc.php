<!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Inicia sesión</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<style>
body, html {
  height: 100%;
  width: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  background-image: url("logos/fondo1.jpg");
  height: 100%;
  background-position: center;
  background-repeat: repeat-x;
  background-size: cover;
  position: relative;
}
.container {
  opacity:0.85;
  position: absolute;
  right: 0;
  margin: 40px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
  border-radius: 10px;
}

input[type=text], input[type=password], input[type=date],input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password], input[type=date], input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}

.btn1 {
  background-color: teal;
  color: white;
  padding: 16px 20px;
  border-radius: 10px;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.btn2 {
  background-color: #33B08E;
  color: white;
  padding: 16px 20px;
  border-radius: 10px;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 5;
}


.cancelbtn {
  width: auto;
  color: white;
  padding: 10px 18px;
  background-color: #f44336;
  border-radius: 10px;
}


.registrarbtn {
  width: 200px;
  height: 50px;
  padding: 10px 18px;
  color: white;
  background-color: #33B08E;
  border-radius: 10px;
}
/* Center the image and position the close button */

.container1 {
  padding: 16px;
  border-radius: 10px;

}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}

/* Modal Content/Box */
.modal-content {
   border-radius: 10px;
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
  border-radius: 10px;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
    border-radius: 10px;
     width: 100%;
  }
}
.logo{
    position: relative;
    left: 30%;
    border-radius: 60px;
}
</style>
</head>
<body>
<div class="bg-img">
  <div class="container">
  <form action="inic.php" method="POST" autocomplete="off">
    <a href="index.php"><img src="logos/logocen.png" border="0" height=100 class="logo"></a>
    <h1>Cliente</h1>
    <label><b>Usuario</b></label>
    <input type="text" placeholder="Ingrese su usuario" name="user" required>

    <label><b>Contraseña</b></label>
    <input type="password" placeholder="Ingrese su contraseña" name="password" required>

    <button type="submit" class="btn1">Entrar</button>
  </form>
 <button onclick="document.getElementById('id01').style.display='block'"  class="btn2">Registrarme</button>
  </div>
</div>

<div id="id01" class="modal">

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">X</button>
    </div>

    

    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

<div class="bg-img">
  <div class="container">
    <form action='g_cliente.php' method='post' autocomplete="off" c>
          <label>Nombre</label>
          <input type='text' name='nombre' required placeholder="Ingrese su(s) nombre(s)">
          <br>
          <label>Apellido Paterno</label>
          <input type='text' name='ap' required placeholder="Ingrese su apellido paterno">
          <br>  
          <label>Apellido Materno</label>
          <input type='text' name='am' placeholder="Ingrese su apellido materno">
          <br>
          <label>Correo</label>
          <input type='email' name='correo' required placeholder="Ingrese su email">
          <br>
          <label>Cotraseña</label>
          <input type='password' name='contra' required placeholder="Ingrese contraseña">
          <br>      
          <input style="opacity:1;" type="checkbox" required name="terminos"><p>Aceptar los <a style="color:blue;" href="terminos.pdf" target="_blank">Términos y Condiciones</a></p>  
          <br>
      <button type="submit" class="registrarbtn" class="btn">Registrarme</button>
      </form>
    </div>
</div>
  </form>

  <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>