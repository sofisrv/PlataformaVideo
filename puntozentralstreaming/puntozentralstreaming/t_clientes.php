<?php
require_once('crud_cliente.php');
require_once('clase_cliente.php');
$crud=new CrudCliente();
$clientes= new Cliente();
$listaclientes=$crud->mostrar();
?>
<!DOCTYPE html>
<html>
<head><meta charset="euc-jp">
	    <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Clientes</title>
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

<a href="n_cliente.php"><button class="btn">Nuevo</button></a>
<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar Cliente..." title="Escribe Nombre de cliente">
<a><button class="eliminar"  OnClick="location.href='p_clientes.php'">.</button></a>
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
			    <th style="width:40%;"><h2>Nombre</h2></th>
			    <th style="width:20%;"><h4>Contraseña</h4></th>
			    <th style="width:30%;"><h4>Correo</h4></th>
			    <!--<th style="width:10%;"><h4>Estado</h4></th>-->
			    <th style="width:5%;"></th>
			    <th style="width:5%;"></th>
			  </tr>
				<tbody>
					<?php foreach ($listaclientes as $clientes) {?>
				    <?php 
				          $nombre= $clientes->getnombre()." ".$clientes->getap()." ".$clientes->getam();
				          $correo= $clientes->getcorreo(); 
				          $estado= 1; 
				    ?>
							<tr>
								<td><b><?php echo $nombre?></b></td>
								<td><?php echo "*******************"?></td>
								<td><?php echo $correo?></td>
								<td>
				                  <a href="t_paqscliente.php?id_cliente=<?php echo $clientes->getid_cliente()?>"><button>Paquetes</button></a>
				                </td>
				                <td>
				                  <a href="m_cliente.php?id_cliente=<?php echo $clientes->getid_cliente()?>&accion=a"><button>Modificar</button></a>
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