<?php
//archivo door.php al que llegan los form del inicio

//recibiendo parámetros POST
$uno=$_POST['us'];
$dos=$_POST['pw'];

//haciendo la consulta
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");


if(isset($_POST['can']) && !empty($_POST['can'])){
    //alguien esta ingresando
    $registro=mysql_query("SELECT * from estudiante")
    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

      if( $reg['USER'] == $uno && $reg['PASS']==$dos){
        echo("Usuario Registrado");
        $trust=TRUE;
        session_start();
        $_SESSION['user']=$reg['USER'];
	$_SESSION['id_u']=$reg['ID_ESTUDIANTE'];
        header("location:index.php?seccion1=ok,id=".$_SESSION['id_u']);

      }

    }

    if( empty($trust)){
    header("location:index.html?status:usuarionoencontrado");
    }
}
else {

  if(isset($_POST['can2']) && !empty($_POST['can2'])){
    //se esta registrando alguien
    $tres=$_POST['nom'];
    $cuatro=$_POST['ape'];
    $seis=$_POST['lin'];
    $siete=$_POST['bole'];


    //realizando el query para agregar datos
    mysql_query("INSERT INTO estudiante (BOLETA,USER,PASS,NOMBRE,APELLIDO,CARRERA,LINEA)
    VALUES ('$siete','$uno','$dos','$tres', '$cuatro','INGENIERIA EN INFORMATICA','$seis'); ", $a);
     echo("alert('REGISTRADO: ingrese con su usuario y password')");
    header("location:index.html?status:registrado ");

  }
  else{

if(isset($_POST['can3']) && !empty($_POST['can3'])){

session_start();
  $q=$_POST['asunto'];
  $w=$_POST['cuerpo'];
  $r=$_POST['fecha'];
  $t=$_POST['ida'];
$y=$_SESSION['id_u'];
	//agregando comentario

  //realizando el query para agregar datos
  mysql_query("INSERT INTO comentario (ASUNTO,CUERPO,FECHA,ID_ESTUDIANTE,ID_ART_U)
  VALUES ('$q','$w','$r','$y','$t'); ", $a);


header("location:index.php?seccion1=comentario-ok");

}

else{

      if(isset($_POST['can4']) && !empty($_POST['can4'])){
        $q=$_POST['titulo'];
        $w=$_POST['fecha'];
        $e=$_POST['cuerpo'];
        $r=$_POST['materia'];
        $t=$_POST['autor'];
	$y=mt_rand(1,110);

	//verificar que no este el numero

    $registro=mysql_query("SELECT * from art_u")
    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($regi=mysql_fetch_array($registro)){

      if ($regi['ID_ART_U'] == $y){ 
	$y=$y+1;
	}
	else{
	break;
}//if

    }

        mysql_query("INSERT INTO art_u (ID_ART_U,TITULO,DAT,CUERPO,ID_MATERIA,PROPIETARIO)
        VALUES ('$y','$q','$w','$e','$r','$t'); ", $a);
        
        $id = mysql_query("select estudiante.ID_ESTUDIANTE from estudiante where estudiante.USER = '".$t."'",$a);
        $idu=mysql_fetch_array($id);
        $sql = "insert into pertenece values (null,".$idu['ID_ESTUDIANTE'].",".$y.")";
        $retval = mysql_query( $sql, $a );

      header("location:index.php?seccion1=entradaok".$y);




      }else{

        if(isset($_POST['can5']) && !empty($_POST['can5'])){
session_start();
          $q=$_POST['titulo'];
          $w=$_POST['fecha'];
          $e=$_POST['cuerpo'];
          $r=$_POST['materia'];
          $t=$_POST['autor'];
$y=$_POST['id'];
          
//echo($q." y cuerpo: ".$e." y materia id: ".$r." id del archivo:#:".$y);
          mysql_query("UPDATE art_u SET TITULO='$q', DAT='$w',CUERPO='$e',
            ID_MATERIA='$r'
          WHERE ID_ART_U='$y' " ) or die (mysql_error());


          header("location:index.php?seccion1=entrada-modificada");


        }else{


		if(isset($_POST['can6']) && !empty($_POST['can6'])){
			//actualizando

		$q=$_POST['lin'];
          	$w=$_POST['pass'];
		$y=$_POST['us'];

		mysql_query("UPDATE estudiante SET PASS='$w', LINEA='$q' WHERE USER='$y'" )
		 or die (mysql_error());


          header("location:index.php?seccion1=perfil-ok");


		}else{
		  //alguien quiere ingresar aqui sin ingresar o registrarse
		  header("location:index.html?status:nopermitido");
		}
        }
      }

  }
}
}


?>
