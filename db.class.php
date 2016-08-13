<?php

class db {

  
  protected $conex;
  public  $coincidencia;
  //entrada
  protected $tit;
  protected $body;
  protected $aut;
  protected $date;
  protected $key;
  protected $keyo;
  protected $keyt;
  //modificar
  protected $id;
  protected $newbody;
  protected $newa;
  protected $newb;
  protected $newc;

        public function agregar_entrada($a,$b,$c,$d,$e,$f,$g){

          //AGREGAR

          $this->tit=$a;
          $this->body=$b;
          $this->aut=$c;
          $this->date=$d;
          $this->key=$e;
          $this->keyo=$f;
          $this->keyt=$g;

          //realizando la conexion
          $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
          mysql_select_db("ipnetwork",$a)or die("checar conexion");
          //realizando el query para agregar datos
          mysql_query("INSERT INTO art_u (TITULO,CUERPO,AUTOR,DAT,CLAVE,CLAVEO,CLAVET)
           VALUES ('$this->tit','$this->body','$this->aut','$this->date',
           '$this->key','$this->keyo','$this->keyt')",$a);
          echo "datos agregados exitosamente";

      }



      public function leer_archivo( $user ){

        //realizando la conexion
        $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

          $registro=mysql_query(
            "SELECT art_u.ID_ART_U, art_u.TITULO,materias.NOMBRE_MATERIA,art_u.VOTACION, art_u.DAT,estudiante.USER 
             from art_u INNER JOIN materias on art_u.ID_MATERIA = materias.ID_MATERIA inner JOIN pertenece on pertenece.ID_ART_U = art_u.ID_ART_U 
             INNER JOIN estudiante on estudiante.ID_ESTUDIANTE = pertenece.ID_ESTUDIANTE WHERE estudiante.USER ='".$user."'"
            )
          or die ("problemas en consulta: ".mysql_error());

          //recuperando los datos de una base de datos
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
                   echo $reg['USER'];
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
          echo " </table>";

      }//fucnion leer arhcivo






      public function modificar_entrada($a,$b,$c,$d,$e){
        //recibiendo los parámetros
        $this->id=$a;
        $this->newbody=$b;
        $this->newa=$c;
        $this->newb=$d;
        $this->newc=$e;

        //realizando la conexion
        $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");

        //realizar la actualización
        mysql_query("UPDATE art_u set CUERPO = '$this->newbody',CLAVE='$this->newa',
          CLAVEO='$this->newb', CLAVET='$this->newc' WHERE ID='$this->id'")
         or die (mysql_error());

        echo "actualizacion correcta";

      }//modificar


     public function comentariosSeccion($comentar){

      $a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
        mysql_select_db("ipnetwork",$a)or die("checar conexion");
      $registro = mysql_query("SELECT art_u.TITULO, estudiante.USER, comentario.FECHA, comentario.ASUNTO, comentario.CUERPO  from comentario INNER JOIN  estudiante on comentario.ID_ESTUDIANTE = estudiante.ID_ESTUDIANTE  INNER JOIN art_u ON comentario.ID_ART_U = art_u.ID_ART_U WHERE art_u.ID_ART_U like ".$comentar) or die ("problemas en consultas:".mysql_error());


        if(mysql_num_rows($registro) == 0){



                   echo "<div class='alert alert-success' role='alert'>Parece que aun no tienes comentarios SNOP</div>";

         } else if ($registro){

            while ( $reg = mysql_fetch_array( $registro ) )
                {


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



                 }


      echo "</div>";
      echo "</div>";
      echo "</div>";

  }

     }

}



 ?>
