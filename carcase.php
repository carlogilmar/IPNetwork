<?php
session_start();
//conexion a la db
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/estilos.css">
<link href="ABCwin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="ABCwin.js"></script>

	<title>IPNetwork</title>
</head>
<body data-spy="scroll" data-target="#myNavbar" data-offset="70">



<!-- esta es la parte del encabezado -->
<header class="navbar-fixed-top ">
<nav role="navegacion" class="navbar navbar-default " id="mynavbar">

        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="glyphicon glyphicon-user"><label>username</label></span>

            </button>
            <button type="button" data-target="#navbarCollap" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="images/logotipo.jpg" class="logo" alt="logotipo">
        </div>

<div id="navbarCollap" class="collapse navbar-collapse">

    <form name="formulario1" class="navbar-form navbar-left " method="get" action="index.php" >
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar por..." name="coincidencia" />
      <span class="input-group-btn">
        <input type= "hidden" name = "go" value="1">
        <input name="enviar" type="submit" class="btn btn-default" value="enviar" /> Go!
      </span>
    </div><!-- /input-group -->
  </form>

 
    <ul class="nav navbar-nav navbar-right">
        <li>
        <form name="formulario2" method="get" action="index.php">
        <button type="submit" class="btn btn-link  btn-lg" name="seccion1">Libreta</button>
        </form>
        </li>   
        <li class="logout">
        <form method="get" action="out.php">
        <button type="submit" onclick="alert('USTED ESTA TERMINANDO SESION')" class="btn btn-primary btn-sm">Logout</button>
        </form>
        </li> 
    </ul>
  

 </div>
</nav>
</header>
<!-- Fin del encabezado -->



<!-- en esta parte se encuentra la columna izquieda -->

  <div id="navbarCollapse" class="collapse navbar-collapse">
  <div class="panel panel-default col-sm-12 col-md-4 col-lg-3 colizq">
    <div class="thumbnail ">

      <div class=" col col-sm-4 col-md-12 col-lg-12">
        <div class="contenedor-img">
        <img src="images/foto.jpg" class="foto" alt="perfil">
        <h2><?php echo($_SESSION['user']); ?></h2>
        </div>
        <div class="btn-block"><a href="update.php"  rel='GET:id=7' rev='abcwin[700,900]' type="button" class="btn btn-primary btn-xs btn-block">Perfil</a></div>

        <div class="caption seccion2">
        <div class="btn-group " role="group" aria-label="...">
          <button type="button" class="btn btn-default"><small>Amigos <span class="badge">4</span></small></button>
          <button type="button" class="btn btn-default"><small>Notas  <span class="badge">4</span></small></button>
        </div>
      </div>
      </div>
       </div>

          <div class="list-group col col-sm-4 col-md-12 col-lg-12">
          <ul class="list-group">

<?php
$us=$_SESSION['user'];

$registro=mysql_query("SELECT * from estudiante WHERE USER='$us'")or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){
	echo("



          <li class='list-group-item'><strong>Nombre : </strong> ".$reg['NOMBRE']."</li>
          <li class='list-group-item'><strong>Apellidos: </strong> ".$reg['APELLIDO']."</li> <!--para el registro se va a pedir fecha de nacimiento-->
          <li class='list-group-item'><strong>Carrera: </strong> ".$reg['CARRERA']."</li>
          </ul>
          </div>
          <div class='list-group col col-sm-4 col-md-12 col-lg-12'>
          <ul class='list-group'>
          <li class='list-group-item'><strong>Institucion: </strong> UPIICSA </li>
          <li class='list-group-item'><strong>Boleta: </strong> ".$reg['BOLETA']."</li>
          <li class='list-group-item'><strong>Linea Curricular:</strong> ".$reg['LINEA']."</li><br>
          <li><a href='matprof.php' rel='GET:id=7' rev='abcwin[700,900]'>Profesores y Materias</a></li><br>

");


}

?>

          
          </ul>
          </div>



  <!--    <a value="seccion1"  class="list-group-item" rel="GET:id=7" rev="abcwin[700,450]">Datos de estudiante</a> -->






  </div>
  </div>

<div class="col-sm-12 col-md-8 col-lg-9 colder ">
 <?php

 if(isset($_GET['seccion1'])){
   trabajosSubidos();

  }else if(isset($_GET['enviar'])){
    busquedaRapida();

  }else if(isset($_GET['comentar'])){
    trabajosSubidos();
    comentarios();

  }else if(isset($_GET['comentar2'])){
    busquedaRapida();
    comentarios();

  }else if(isset($_GET['buscar'])){
    trabajosSubidos();

  }else if(isset($_GET['buscar2'])){
    busquedaRapida();
  }else if(isset($_GET['eliminar']) || isset($_GET['eliminarEnlace'])){
      trabajosSubidos();
  }




 ?>

</div>





	<script src="js/jquerry.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</body>
</html>
