<?php
require_once('crud_curso.php');
require_once('clase_curso.php');
$crud=new Crudcurso();
$cursos= new Curso();
$listaCursos=$crud->mostrarpapelera();
?>
<!DOCTYPE html>
<html>
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
<title>Cursos</title>
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
  background:url("logos/video.jpg") center no-repeat;
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
<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar Curso en papelera..." title="Buscar grupo">
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:95%;"><h2>Grupo en PAPELERA</h2></th>
          <th style="width:5%;"></th>
        </tr>
        <tbody>
          <?php foreach ($listaCursos as $cursos) {?>
            <?php 
                  $nombre= $cursos->getnombre(); 
            ?>
              <tr>
                <td><b><?php echo $nombre?></b></td>

                  <td>
                    <a href="m_curso.php?id_curso=<?php echo $cursos->getid_curso()?>"class="editar"></a></td>
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