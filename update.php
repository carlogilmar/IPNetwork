<?php
session_start();

//conexion a la db
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");

$id=$_GET['comentar'];

$time=time();

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>IPNetwork</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">
<br><br><br>

<strong><h2 align='center'>EDITAR PERFIL</h2></strong>

<table border=2 align='center'>

<?php

$us=$_SESSION['user'];

echo ($_SESSION['id_u']);
$registro=mysql_query("SELECT * from estudiante WHERE USER='$us' ")    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

echo("<tr><td align='center'>BOLETA:</td><td align='center'>".$reg['BOLETA']."</td></tr>");
echo("<tr><td align='center'>NOMBRE:</td><td align='center'>".$reg['NOMBRE']."</td></tr>");
echo("<tr><td align='center'>APELLIDOS:</td><td align='center'>".$reg['APELLIDO']."</td></tr>");
echo("<tr><td align='center'>LÍNEA CURRICULAR</td><td align='center'>".$reg['LINEA']."</td></tr>");
echo("<tr><td align='center'>CARRERA</td><td align='center'>".$reg['CARRERA']."</td></tr>");
echo("<tr><td align='center'>PASSWORD</td><td align='center'>".$reg['PASS']."</td></tr>");

}

?>


</table>


<br>

<strong><h3 align='center'>MODIFICA TU PERFIL</h3></strong>
<br>
<?php

echo("<form method=POST action=door.php>");

echo("

<select name='lin'>

									<option value='CERTIFICACIONES'>Certificaciones</option>
									<option value='iNTERFACES FISICAS'>Interfaces</option>
									<option value='VIDEOJUEGOS'>Videojuegos</option>
									<option value='SEGURIDAD'>Seguridad</option>

								</select>

<input type=text placeholder='PASSWORD'  name='pass'/>
<input type=text name='us' value=".$us." readonly/><br>
<input type=hidden name='can6'  value='1'/>
<input type=submit value='ACTUALIZAR' />
</form>

");

?>