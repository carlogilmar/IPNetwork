<?php
  require_once('carcase.php');

  
   

  function trabajosSubidos(){
   $archivo; $buscar; $radio; $materia;
   $user = $_SESSION['user'];
   $lineac = lineaCurricular($user);
   
  ?>
  <div class="container">
      <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Mi libreta de apuntes</h3>
  </div>
  <div class="doit panel-body">
  <div class="col col-lg-12 col-md-9 col-sm-9 col-xs-12">
  <ul class="nav navbar-nav">
  <li style="padding-top:20px;">
  <a href="entrada.php" class="btn btn-link" rel="GET:id=7" rev="abcwin[700,900]"><span class="glyphicon glyphicon-save-file"> Nueva entrada</span></a>
  </li>

 <li style="padding-top:20px;">
  <a href="general.php" class="btn btn-link" rel="GET:id=7" rev="abcwin[700,900]"><span class="glyphicon glyphicon-save-file"> Ver Archivo General</span></a>
  </li>
  </ul>


<form>
  <div class="seccion3 ">
       <div class="navbar-form navbar-left">
        <div class="input-group ">
          <input type="text" class="form-control" placeholder="archivo" name="archivo">
        <div class="input-group-btn">
        <div class="dropdown">
        
        
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        
        

<?php
       echo "<li><div style='padding-left:10px;'><input type='checkbox' value='".$lineac[0]."' name='materia1' ><small> ".$lineac[0]."</small></div></li>";
       echo "<li><div style='padding-left:10px;'><input type='checkbox' value='".$lineac[1]."' name='materia2' ><small> ".$lineac[1]."</small></div></li>";
       echo "<li><div style='padding-left:10px;'><input type='checkbox' value='".$lineac[2]."' name='materia3' ><small> ".$lineac[2]."</small></div></li>";
        
        

?>
        <li role="separator" class="divider"></li>
        <li><div class="radio"><label style="padding-left:10px;"><input type="radio" name="radio" id="optionsRadios1" value="PROPIOS" checked>  Sólo mis trabajos</label></div></li>
        <li><div class="radio"><label style="padding-left:10px;"><input type="radio" name="radio" id="optionsRadios2" value="AJENOS">  Trabajos de otros</label></div></li>
        <li><div class="radio"><label style="padding-left:10px;"><input type="radio" name="radio" id="optionsRadios3" value="INDISTINTO">  Indistinto</label></div></li>
        </ul>
        <input class="btn btn-default" type="submit" name="buscar" vaue="Buscar">
        </div>
        </div>
       </div>
      </div>
  </div>
</form>

  <table class="table table-hover">
  <tr class="active sin" >
    <td>Nombre</td>
    <td>Materia</td>
    <td>Votaciones</td>
    <td>Fecha</td>
    <td>Propiedad</td>
  </tr>


  <?php
 
  $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

        if(!isset($_GET['materia1'])){$_GET['materia1']='';}
        if(!isset($_GET['materia2'])){$_GET['materia2']='';}
        if(!isset($_GET['materia3'])){$_GET['materia3']='';}

            if(isset($_GET['eliminar'])){
            
            $sql = "DELETE FROM pertenece WHERE pertenece.ID_ART_U = ".$_GET['eliminar']."";
            $retval = mysql_query( $sql, $a );
            $sql = "DELETE FROM art_u WHERE art_u.ID_ART_U = ".$_GET['eliminar']."";
            $retval = mysql_query( $sql, $a );

             }else if(isset($_GET['eliminarEnlace'])){
            $sql = "DELETE FROM pertenece WHERE pertenece.ID_ART_U = ".$_GET['eliminarEnlace']."";
            $retval = mysql_query( $sql, $a );


            }

  
  if(isset($_GET['seccion1']) || isset($_GET['comentar']) || isset($_GET['buscar']) && $_GET['radio'] == 'INDISTINTO' && empty($_GET['materia1']) && empty($_GET['materia2']) && empty($_GET['materia3']) || !isset($_GET['buscar'])){
            
            $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER, art_u.PROPIETARIO 
            from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA 
            inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
            INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE estudiante.USER = '".$user."' ORDER BY art_u.DAT DESC"
            )
          or die ("problemas en consulta: ".mysql_error());

          $_GET['archivo'] ='';  $_GET['radio']='';
    
  }else if(isset($_GET['buscar']) &&  $_GET['radio'] == 'PROPIOS'){

          
          $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER, art_u.PROPIETARIO
             from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
             INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE estudiante.USER = '".$user."' AND art_u.PROPIETARIO = '".$user."' 
             and art_u.TITULO like '%".$_GET['archivo']."%' AND (materias.NOMBRE_MATERIA = '".$_GET['materia1']."' OR 
             materias.NOMBRE_MATERIA = '".$_GET['materia2']."' OR materias.NOMBRE_MATERIA = '".$_GET['materia3']."') ORDER BY materias.NOMBRE_MATERIA ASC"
            )
          or die ("problemas en consulta: ".mysql_error());

  }else if(isset($_GET['buscar']) && $_GET['radio'] == 'AJENOS'){
        
        $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER, art_u.PROPIETARIO
             from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
             INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE estudiante.USER = '".$user."' AND art_u.PROPIETARIO != '".$user."' 
             and art_u.TITULO like '%".$_GET['archivo']."%' AND (materias.NOMBRE_MATERIA = '".$_GET['materia1']."' OR 
             materias.NOMBRE_MATERIA = '".$_GET['materia2']."' OR materias.NOMBRE_MATERIA = '".$_GET['materia3']."') ORDER BY materias.NOMBRE_MATERIA ASC"
            )
          or die ("problemas en consulta: ".mysql_error());

  }else if(isset($_GET['buscar']) && $_GET['radio'] == 'INDISTINTO' && (isset($_GET['materia1']) || isset($_GET['materia2']) || isset($_GET['materia3']))){
    $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER, art_u.PROPIETARIO
             from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
             INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE estudiante.USER = '".$user."'
             AND (materias.NOMBRE_MATERIA = '".$_GET['materia1']."' OR 
             materias.NOMBRE_MATERIA = '".$_GET['materia2']."' OR materias.NOMBRE_MATERIA = '".$_GET['materia3']."' ) ORDER BY art_u.DAT ASC"
            )
          or die ("problemas en consulta: ".mysql_error());
  }else {
  echo "<div class='alert alert-info' role='alert'>No te engañes a ti mismo, no existe tal contenido</div>";
   return;

  }
   
  
  if(mysql_num_rows($registro) != 0)
  {     
          
	

          //recuperando los datos de una base de datos
          while($reg=mysql_fetch_array($registro)){

                   echo "<tr>";
                   echo "<td>".$reg['TITULO']."</td>";
                   echo "<td>".$reg['NOMBRE_MATERIA']."</td>";
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
                   echo "<li><a href='verdb.php?comentar=".$reg['ID_ART_U']."' rel='GET:id=7' rev='abcwin[700,900]'>Acceder</a></li>";
                   echo "<li><a href='retro.php?comentar=".$reg['ID_ART_U']."' rel='GET:id=7' rev='abcwin[700,900]'>Retroalimentar</a></li>";

                   if($reg['PROPIETARIO'] != $reg['USER'] && isset($_GET['buscar'])){
                    echo "<li><a href='index.php?eliminarEnlace=".$reg['ID_ART_U']."&materia1=".$_GET['materia1']."&materia2=".$_GET['materia2']."&materia3=".$_GET['materia3']."&radio=".$_GET['radio']."&archivo=".$_GET['archivo']."&buscar=enviar' >Eliminar enlace</a></li>";
                   }else if($reg['PROPIETARIO'] != $reg['USER'] && !isset($_GET['buscar'])){
                    echo "<li><a href='index.php?eliminarEnlace=".$reg['ID_ART_U']."' >Eliminar enlace</a></li>";

                   }else if($reg['PROPIETARIO'] == $reg['USER'] && isset($_GET['buscar'])){

                   echo "<li><a href='index.php?eliminar=".$reg['ID_ART_U']."&materia1=".$_GET['materia1']."&materia2=".$_GET['materia2']."&materia3=".$_GET['materia3']."&radio=".$_GET['radio']."&archivo=".$_GET['archivo']."&buscar=enviar' >Eliminar</a></li>";
                   
                   }else if($reg['PROPIETARIO'] == $reg['USER'] && !isset($_GET['buscar'])){
                   echo "<li><a href='index.php?eliminar=".$reg['ID_ART_U']."' >Eliminar </a></li>";

                   }


                   echo "<li role='separator' class='divider'></li>";
                   echo "<li><a href='index.php?comentar=".$reg['ID_ART_U']."&materia1=".$_GET['materia1']."&materia2=".$_GET['materia2']."&materia3=".$_GET['materia3']."&radio=".$_GET['radio']."&archivo=".$_GET['archivo']."&buscar=enviar' >Comentarios</a></li>";

                   echo "</ul>";
                   echo " </div>";
                   echo "</td>";
                   echo "</tr>";

          }
          echo " </table>";
   }else if(mysql_num_rows($registro) == 0) {
     echo " </table>";
     echo "<div class='alert alert-info' role='alert'>No te engañes a ti mismo, no existe tal contenido</div>";


   }



          ECHO "</div>";
          ECHO "</div>";
          ECHO "</div>";
          ECHO "</div>";


   }







function busquedaRapida(){
   $user = $_SESSION['user'];
   $lineac = lineaCurricular($user);
   

    ?>



  <div class="container">
      <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Busqueda rápida</h3>
  </div>
  <div class="doit panel-body">
  <div class="col col-lg-12 col-md-9 col-sm-9 col-xs-12">

<form>
  <div class="seccion3">
      <div class="navbar-form navbar-left">  
      <ul class="nav nav-pills">

      <li>
       <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="username">
        </div>
      </li>
      <li>

        <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

<?php
       echo "<li><div style='padding-left:10px;'><input type='radio' value='".$lineac[0]."' name='materia22' id='optionsRadios1'><small> ".$lineac[0]."</small></div></li>";
       echo "<li><div style='padding-left:10px;'><input type='radio' value='".$lineac[1]."' name='materia22' id='optionsRadios2'><small> ".$lineac[1]."</small></div></li>";
       echo "<li><div style='padding-left:10px;'><input type='radio' value='".$lineac[2]."' name='materia22' id='optionsRadios3'><small> ".$lineac[2]."</small></div></li>";
       echo "<li><div style='padding-left:10px;'><input type='radio' value='' name='materia22' id='optionsRadios4' checked><small>  INDISTINTO</small></div></li>";
        

?>


        <li role="separator" class="divider"></li>
        <li><label style="padding-left:10px;"><input type="checkbox" name="check" value="votacion">  Mejor votados</label></li>
        </ul>
<?php
        echo "<input  type='hidden' value='".$_GET['coincidencia']."' name='coincidencia'>";
 ?>       
        <input class="btn btn-default" type="submit"  value="Buscar" name="buscar2">    
        
        </div>
       </li>
      </div>
  </div>
</form>

  <table class="table table-hover">
  <tr class="active sin" >
    <td>Nombre</td>
    <td>Materia</td>
    <td>Votaciones</td>
    <td>Fecha</td>
    <td>Propietario</td>
  </tr>

<?php
  
   $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

        if(!isset($_GET['materia22'])){ $_GET['materia22'] = "";}


        if(isset($_GET['votacion'])){
          //echo $_GET['votacion']."entro aqui";
          if(isset($_GET['enviar'])){
            $sql = "UPDATE art_u SET `VOTACION` = '".$_GET['votacion']."' WHERE art_u.ID_ART_U = ".$_GET['enviar']."";
            $retval = mysql_query( $sql, $a );
          }else if(isset($_GET['buscar2'])){
           $sql = "UPDATE art_u SET `VOTACION` = '".$_GET['votacion']."' WHERE art_u.ID_ART_U = ".$_GET['buscar2'].""; 
           $retval = mysql_query( $sql, $a );
          }
          
        }


         if(isset($_GET['agregar'])){
            $id = mysql_query("select estudiante.ID_ESTUDIANTE from estudiante where estudiante.USER = '".$user."'",$a);
            $idu=mysql_fetch_array($id);
            
          if(isset($_GET['enviar'])){
            $sql = "insert into pertenece values (null,".$idu['ID_ESTUDIANTE'].",".$_GET['enviar'].")";
            $retval = mysql_query( $sql, $a );
          }else if(isset($_GET['buscar2'])){
           $sql = "insert into pertenece values (null,".$idu['ID_ESTUDIANTE'].",".$_GET['buscar2'].")";
           $retval = mysql_query( $sql, $a );
          }
          
        }
 

    if(isset($_GET['enviar']) && !empty($_GET['coincidencia']) || isset($_GET['comentar2']) && !empty($_GET['coincidencia']) || isset($_GET['buscar2']) && !empty($_GET['coincidencia']) ){
        
            $registro = mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT, art_u.PROPIETARIO from art_u 
            INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA WHERE art_u.TITULO LIKE '%".$_GET['coincidencia']."%' 
            and art_u.PROPIETARIO != '".$user."' AND materias.NOMBRE_MATERIA LIKE '%".$_GET['materia22']."%' ORDER BY art_u.DAT ASC"
           )
           or die ("problemas en consulta: ".mysql_error());

           
        
    }else if (!empty($_GET['coincidencia']) && isset($_GET['check']) ){

        $registro = mysql_query(
        "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT, art_u.PROPIETARIO from art_u 
        INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA WHERE art_u.TITULO LIKE '%".$_GET['coincidencia']."%' and art_u.PROPIETARIO != '".$user."' 
        AND materias.NOMBRE_MATERIA = '%".$_GET['materia22']."%' ORDER BY art_u.VOTACION ASC"
        )
           or die ("problemas en consulta: ".mysql_error());
          
    }else if(isset($_GET['enviar']) && empty($_GET['coincidencia']) ) {
       return;

    }else{
       return;

    }

    if(mysql_num_rows($registro) == 0 || $registro == NULL){


                   echo " </table><br><br>";
                   echo "<div class='alert alert-danger' role='alert'>OH DIABLOS! Cambia algunas cosas e intenta de nuevo :(</div>";

         } else if ($registro){

            while($reg=mysql_fetch_array($registro)){
                  $vote = $reg['VOTACION']+1;

                   echo "<tr>";
                   echo "<td>".$reg['TITULO']."</td>";
                   echo "<td>".$reg['NOMBRE_MATERIA']."</td>";

                   echo "<td>";
                   echo "&nbsp;&nbsp;&nbsp;".$reg['VOTACION']."&nbsp;&nbsp;&nbsp;";

                  if(isset($_GET['enviar']) && !empty($_GET['coincidencia']) || isset($_GET['comentar2']) && !empty($_GET['coincidencia']) ){

                  echo "<a href='index.php?votacion=".$vote."&enviar=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."' ><span class='glyphicon glyphicon-plus'></span></a>";

                  }else if(!empty($_GET['coincidencia']) && isset($_GET['buscar2']) && isset($_GET['check']) ){

                  echo "<a href='index.php?votacion=".$vote."&buscar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."&username=".$_GET['username']."&materia22=".$_GET['materia22']."&check=".$_GET['check']."' ><span class='glyphicon glyphicon-plus'></span></a>";

                  }else if(!empty($_GET['coincidencia']) && isset($_GET['buscar2']) && !isset($_GET['check']) ){

                  echo "<a href='index.php?votacion=".$vote."&buscar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."&username=".$_GET['username']."&materia22=".$_GET['materia22']."' ><span class='glyphicon glyphicon-plus'></span></a>";

                  }
                   
                  
                   echo "</td>";

                   

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
                   echo "<li><a class='btn btn-default disabled' style='padding-left:20px; text-align: left;' role='button'>Ver perfil</a></li>";
                  

                  if(isset($_GET['enviar']) && !empty($_GET['coincidencia']) || isset($_GET['comentar2']) && !empty($_GET['coincidencia']) ){

                   echo "<li><a href='index.php?comentar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."' >Comentarios</a></li>";

                  }else if(!empty($_GET['coincidencia']) && isset($_GET['buscar2']) && isset($_GET['check']) || isset($_GET['comentar2']) && !empty($_GET['coincidencia']) && isset($_GET['check'])){

                   echo "<li><a href='index.php?comentar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."&username=".$_GET['username']."&materia22=".$_GET['materia22']."&check=".$_GET['check']."' >Comentarios</a></li>";

                  }else if(!empty($_GET['coincidencia']) && isset($_GET['buscar2']) && !isset($_GET['check']) || isset($_GET['comentar2']) && !empty($_GET['coincidencia']) && !isset($_GET['check'])){

                    echo "<li><a href='index.php?comentar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."&username=".$_GET['username']."&materia22=".$_GET['materia22']."' >Comentarios</a></li>";
                  }

                   echo "<li role='separator' class='divider'></li>";

                    if(isset($_GET['enviar']) && !empty($_GET['coincidencia']) || isset($_GET['comentar2']) && !empty($_GET['coincidencia']) ){
                 // echo "entro en a";
                  echo "<li><a href='index.php?agregar=1&enviar=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."' >añadir a mi libreta</a></li>";

                  }else if(!empty($_GET['coincidencia']) && isset($_GET['buscar2']) && isset($_GET['check'])){
                   // echo "entro en b";
                  echo "<li><a href='index.php?agregar=1&buscar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."&username=".$_GET['username']."&materia22=".$_GET['materia22']."&check=".$_GET['check']."' >añadir a mi libreta</a></li>";

                  }else if(!empty($_GET['coincidencia']) && isset($_GET['buscar2']) && !isset($_GET['check'])){
                      //echo "entro en c";
                      echo "<li><a href='index.php?agregar=1&buscar2=".$reg['ID_ART_U']."&coincidencia=".$_GET['coincidencia']."&username=".$_GET['username']."&materia22=".$_GET['materia22']."' >añadir a mi libreta</a></li>";

                  }

                   echo "</ul>";
                   echo " </div>";
                   echo "</td>";
                   echo "</tr>";
          }
          echo " </table>";
          
         }     
    

?>

  </div>
  </div>
  </div>

 <?php
  
 }





  function comentarios(){

 ?>

      <div class="container">
      <div class="panel panel-default">
      <div class="panel-heading">
      <h3 class="panel-title">Comentarios</h3>
      </div>
      <div class="panel-body ">
     



<?php
       
      

        if(isset($_GET['comentar'])){
        $comentar = $_GET['comentar'];
        comentariosSeccion($comentar);

        }
        else if(isset($_GET['comentar2'])){
        $comentar = $_GET['comentar2'];
        comentariosSeccion($comentar);

        }

}




      function comentariosSeccion($comentar){

      $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");
      $registro = mysql_query("SELECT art_u.TITULO, estudiante.USER, comentario.FECHA, comentario.ASUNTO, comentario.CUERPO  from comentario INNER JOIN  estudiante on comentario.ID_ESTUDIANTE = estudiante.ID_ESTUDIANTE  INNER JOIN art_u ON comentario.ID_ART_U = art_u.ID_ART_U WHERE art_u.ID_ART_U like ".$comentar) or die ("problemas en consultas:".mysql_error());


        if(mysql_num_rows($registro) == 0){



                   echo "<div class='alert alert-success' role='alert'>Parece que aun no tienes comentarios SNOP</div>";

         } else if ($registro){

            while ( $reg = mysql_fetch_array( $registro ) )
                {

                   echo "<div class='col col-lg-5 col-md-5 col-sm-12 col-xs-12'>";
                  echo "<div class='media-left media-middle'>";
                  echo "<a href='#''>";
                  echo "<img class='media-object' src='images/foto.jpg' alt='...''>";
                  echo "</a>";
                 echo "</div>";
                 echo "<div class='media-body'>";
                echo "<strong>USUARIO:</strong>".$reg['USER']."<strong> FECHA=</strong>".$reg['FECHA']."<br>";
                echo "<strong>ASUNTO: </strong><u>".$reg['ASUNTO']."</u><br>";
                echo "<small>".$reg['CUERPO']."</small>";
                echo "</div>";
                echo "</div>";


                 }


      
                 echo "</div>";
                  echo "</div>";
                  echo "</div>";

                            }

     }


    

    function lineaCurricular($user){
      $lineac;
      $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

          $registro=mysql_query("SELECT estudiante.LINEA from estudiante  WHERE estudiante.USER = '".$user."'")
          or die ("problemas en consulta: ".mysql_error());
          $reg=mysql_fetch_array($registro);
          

         if($reg['LINEA'] == 'CERTIFICACIONES')
         {
           
           return array("SOLARIS", "JAVA", "NET");
           

         } else if($reg['LINEA'] == 'INTERFACES'){
          return array("DISEÑO DE INTERFACES", "SISTEAS EMBEBIDOS", "AUT CON MICROC");
          

         }else if($reg['LINEA'] == 'VIDEOJUEGOS'){
          return array("VIDEOJUEGOS", "REALIDAD AUMENTADA", "REALIDAD VIRTUAL");
          

         }else if($reg['LINEA'] == 'SEGURIDAD'){
          return array("SEGURIDAD EN SOFTWARE", "SEGURIDAD EN REDES", "VIROLOGIA Y CRIPTOLOGIA");
          

         }
         

       
     }


  ?>
