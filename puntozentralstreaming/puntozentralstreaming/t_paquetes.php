<?php
require_once('crud_paquete.php');
require_once('clase_paquete.php');
$crud=new CrudPaquete();
$paquetes= new Paquete();
$listaPaquetes=$crud->mostrar();
?><!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Paquetess</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<style>

html,body{
 height:120%;
  width: 100%;
  font-family: 'Josefin Sans', sans-serif;

}
</style>
<body>
  <?php
  include("navegacionc.php");
  ?>

<br>
<br>
<br>
<br>
<br>
<div class="filtros">
<a href="n_paquete.php"><button class="btn">Nuevo</button></a>
<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar paquete..." title="Buscar paquetes">
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:20%;"><h2>Paquete</h2></th>
          <th style="width:30%;"><h4>Descripcion</h4></th>
          <th style="width:10%;"><h4>Costo</h4></th>
          <th style="width:10%;"><h4>Caducidad</h4></th>
          <th style="width:10%;"><h4>Estado</h4></th>
          <th style="width:10%;"><h4>Venta en linea</h4></th>
          <th style="width:10%;"></th>
        </tr>
        <tbody>
         <?php foreach ($listaPaquetes as $paquetes) {?>
            <?php 
                  $nombre= $paquetes->getnombre(); 
                  $descripcion= $paquetes->getdescripcion(); 
                  $costo= "$".$paquetes->getcosto();
                  $caducidad= $paquetes->getcaducidad()." dias";
                  $estado= $paquetes->getestado(); 
                  if($paquetes->getvisibleonline()=='1'){
                    $visibleonline= "SI"; 
                  }elseif($paquetes->getvisibleonline()=='2'){
                    $visibleonline= "NO"; 
                  }

                  
            ?>
              <tr>
                <td><b><?php echo $nombre?></b></td>
                <td><b><?php echo $descripcion?></b></td>
                <td><b><?php echo $costo?></b></td>
                <td><b><?php echo $caducidad?></b></td>
                <td><?php 
                   if($estado=='1'){
                   echo 'Visible';
                   }if($estado=='2'){
                   echo 'Invisible';
                   }?>
                </td>
                <td><b><?php echo $visibleonline?></b></td>
                <td>
                          <a href="m_paquete.php?id_paquete=<?php echo $paquetes->getid_paquete()?>&accion=a"><button>Modificar</button></a>
                        </td>
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