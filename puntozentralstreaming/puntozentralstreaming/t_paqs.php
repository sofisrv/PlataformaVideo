<?php
require_once('crud_paq.php');
require_once('clase_paq.php');
$crud=new CrudPaq();
$paqs= new Paq();
$listapaqs=$crud->mostrar();
  require 'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Paquetes vendidos</title>
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
.eliminar{
  display:inline-block;
  width:40px;
  height:40px;
  background:url("logos/delete.png") center no-repeat;
  background-size:cover;
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

<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar paquete...">
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:20%;"><h4>Paquete</h4></th>
          <th style="width:20%;"><h4>Grupo</h4></th>
          <th style="width:25%;"><h2>Cliente</h2></th>
          <th style="width:10%;"><h4>Costo</h4></th>
          <th style="width:10%;"><h4>Fecha de inicio</h4></th>
          <th style="width:10%;"><h4>Fecha de caducidad</h4></th>
          <th style="width:5%;"></th>
        </tr>        
        <?php foreach ($listapaqs as $paqs) {
                  $id_cursocliente= $paqs->getid_cursocliente();
                  $id_cliente = $paqs->getid_cliente();
                  $id_curso= $paqs->getid_curso(); 
                  $id_paquete= $paqs->getid_paquete(); 
                  $costo= '$0'; 
                  $f_i= $paqs->getf_i(); 
                  $f_f= $paqs->getf_f(); 
                  $query1 = $mysqli -> query ("SELECT * FROM cliente WHERE id_cliente='$id_cliente'");
                  while ($valores = mysqli_fetch_array($query1)) {
                    $nombre=$valores['nombre'];
                    $a_p=$valores['ap'];
                    $a_m=$valores['am'];
                    $nc= $nombre." ".$a_p." ".$a_m;
                  }
                 $query2 = $mysqli -> query ("SELECT * FROM paquete WHERE id_paquete='$id_paquete'");
                  while ($valores = mysqli_fetch_array($query2)) {
                    $npaq=$valores['nombre'];
                    $ncos="$".$valores['costo'];
                  }
                 $query3 = $mysqli -> query ("SELECT * FROM curso WHERE id_curso='$id_curso'");
                  while ($valores = mysqli_fetch_array($query3)) {
                    $ncurso=$valores['nombre'];
                  }
                  
            ?>
              <tr>
                <td><b><?php echo $npaq?></b></td>
                <td><?php echo $ncurso?></td>
                <td><?php echo $nc?></td>
                <td><?php echo $ncos?></td>
                <td><?php echo $f_i?></td>
                <td><?php echo $f_f?></td>
                 <td><a ><button class="eliminar"  OnClick="location.href='administrar_paq.php?id_cursocliente=<?php echo $id_cursocliente?>&accion=e'"></button></a></td>
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