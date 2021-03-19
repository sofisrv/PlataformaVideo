<?php
require_once('crud_paq.php');
require_once('clase_paq.php');
$crud=new CrudPaq();
$paqs= new Paq();
  require 'conexion.php';
  include ('id_cliente.php');
$listapaqs=$crud->mostrarpaqs($id_cliente);

?><!DOCTYPE html>
<html>
<head><meta charset="gb18030">
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Pagos</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<style>
html,body{
    height:100%;
  width: 100%;
  font-family: 'Josefin Sans', sans-serif;

}
* {
  box-sizing: border-box;
}
.ver1{
  display:inline-block;
  width: 100%;
  height: auto;
  border-radius:10%;
  background:center no-repeat;
  background-size:cover;
  box-shadow:0 2px 3px rgba(0,0,0,0.3);
  margin-bottom:3px 
}

.logofb{
    width: 15%;
    height: auto;
    position: absolute;
    left: 10%;
    padding-bottom: 5%;
}
.logowa{
    width: 15%;
    height: auto;
    position: absolute;
    left: 75%;
    padding-bottom: 5%;
}
.logoig{

    width: 15%;
    height: auto;
    position: absolute;
    left: 42.5%;
     padding-bottom: 5%;
}
.banco{
    width: 80%;
    height: auto;
    left: 20%;
    padding-bottom: 5%;
}
.content{  
  padding:10% 10%;
  text-align:justify
}
</style>
<body>
  <?php
  include("navegacioncliente.php");
  ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="filtros">
<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar..." title="Buscar curso">
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:10%;"><h2>Curso</h2></th>
          <th style="width:30%;"><h4>Paquete</h4></th>
          <th style="width:30%;"><h4>Inicio</h4></th>
          <th style="width:30%;"><h4>Caducidad</h4></th>
        </tr>
        <tbody>
          <?php foreach ($listapaqs as $paqs) {?>
            <?php 
                  $curso= $paqs->getid_curso(); 
                  $paquete= $paqs->getid_paquete();
                  $f_i= $paqs->getf_i();
                  $f_f= $paqs->getf_f();
                  $query2 = $mysqli -> query ("SELECT * FROM paquete WHERE id_paquete='$paquete'");
                  while ($valores = mysqli_fetch_array($query2)) {
                    $npaq=$valores['nombre'];
                    $ncos="$".$valores['costo'];
                  }
                  $query3 = $mysqli -> query ("SELECT * FROM curso WHERE id_curso='$curso'");
                  while ($valores = mysqli_fetch_array($query3)) {
                    $ncurso=$valores['nombre'];
                  }
                  /*$logo= "multimedia/logos".$cursos->getid_curso();*/ 

            ?>
              <tr>
                <td><?php echo $ncurso?></td>
                <td><?php echo $npaq?></td>
                <td><?php echo $f_i?></td>
                <td><?php echo $f_f?></td>
              </tr>
              <?php }?>
            </tbody>
        </tbody>
        </table>
      </div>
    </div>
<section class="content">
    <a href="">
    <img src="logos/db.jpg" border="0" height=100 class="banco">
    </a>
    <p>1.- Registrate o Inicia sesión.</p>
    <p>2.- Paga por transferencia a la cuenta bancaria de la siguiente imagen.</p>
    <p>3.- Envianos un mensaje con comprobante de transferencia a las siguientes redes para confirmar tu paquete.</p>
    <p>4.- ¡Disfruta las mejores clases en el lugar que tu quieras!.</p>
    <br>
    <br>
    <p>Para informes y ayuda da clic en:</p>

    <a href="https://www.facebook.com/puntozentral" target="_blank"><img src="logos/fb.png" border="0" height=100 class="logofb"></a>
    <a href="https://www.instagram.com/puntozentral" target="_blank"><img src="logos/ig.png" border="0" height=100 class="logoig"></a>
        <a href="https://api.whatsapp.com/send?phone=5218443432655&text=Necesito Ayuda.&source=&data=" target="_blank">
    <img src="logos/wa.png" border="0" height=100 class="logowa">
    </a>
</section>
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