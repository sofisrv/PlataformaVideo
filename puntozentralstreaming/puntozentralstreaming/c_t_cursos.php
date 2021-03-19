<?php
require_once('crud_curso.php');
require_once('clase_curso.php');
$crud=new Crudcurso();
$cursos= new Curso();
$listaCursos=$crud->mostrar();
?>
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
  height:100%;
  width: auto;
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
  margin-bottom:3px ;
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
<div class="filtros">
<input type="text" id="filtro1" onkeyup="myFunction()" placeholder="Buscar Curso..." title="Buscar curso">
</div>
  <table id="myTable">
        <tr id="t1" class="w3-teal">
          <th style="width:10%;"><h2>Cursos</h2></th>
          <th style="width:60%;"><h4>Descripción</h4></th>
          <th style="width:30%;"><h4></h4></th>
        </tr>
        <tbody>
          <?php foreach ($listaCursos as $cursos) {?>
            <?php 
                  $nombre= $cursos->getnombre(); 
                  $descripcion= $cursos->getdescripcion(); 
                  $estado= $cursos->getestado(); 
                  $imagen= "files/".$cursos->getid_curso()."/".$cursos->getimagen(); 
                  
                  /*$logo= "multimedia/logos".$cursos->getid_curso();*/ 

            ?>
              <tr>
                <td><b><?php echo $nombre?></b><br><?php echo $descripcion?></td>
               
                <td><img src="<?php echo $imagen?>" class="imgcurso"></td>
                <td><a ><button title="VER VIDEO" ><img src="logos/ver.png"  class="ver1" OnClick="location.href='c_t_videoscurso.php?id_curso=<?php echo $cursos->getid_curso()?>'">VER</a></td>
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