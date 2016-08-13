<?php




function consultaBD(){
  $user = $_SESSION['user'];
 $archivo = $_GET['archivo'];


  $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");
  
  if(isset($_GET['seccion1'])){

            $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER, art_u.PROPIETARIO 
            from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA 
            inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
            INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE estudiante.USER = '".$user."' ORDER BY art_u.DAT"
            )
          or die ("problemas en consulta: ".mysql_error());
    
  }else if(isset($_GET['buscar']) ){
          
          echo "entro aqui";

          $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER, art_u.PROPIETARIO
             from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
             INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE art_u.PROPIETARIO = 'giak' and art_u.TITULO like '%".$archivo."%'"
            )
          or die ("problemas en consulta: ".mysql_error());

  }


   while($reg=mysql_fetch_array($registro)){

                   echo "<tr>";
                   echo "<td>".$reg['TITULO']."</td>";
                   echo "<td>".$reg['NOMBRE_MATERIA']." </td>";
                   echo "<td>".$reg['VOTACION']."</td>";
                   echo "<td>".$reg['DAT']."</td>";
                   echo "<td>";
                   //codigo de dropdown
                   echo "<div class='dropdown'>";
                   echo " <a id='dLabel' data-target='#' href='http://example.com' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>";
                   echo $reg['PROPIETARIO'];
                   echo " <span class='caret'></span>";
                   echo " </a>";
                   echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>";
                   echo "<li><a href='verdb.php?comentar=".$reg['ID_ART_U']."' rel='GET:id=7' rev='abcwin[700,900]'>Visualizar</a></li>";
                   echo "<li><a href='retro.php?comentar=".$reg['ID_ART_U']."' rel='GET:id=7' rev='abcwin[700,900]'>Modificar</a></li>";
                   echo "<li><a href='index.php?comentar=".$reg['ID_ART_U']."' >Eliminar</a></li>";
                   echo "<li role='separator' class='divider'></li>";
                   echo "<li><a href='index.php?comentar=".$reg['ID_ART_U']."' >Comentarios</a></li>";

                   echo "</ul>";
                   echo " </div>";
                   echo "</td>";
                   echo "</tr>";
          }


}




?>