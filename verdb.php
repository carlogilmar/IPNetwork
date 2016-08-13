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


<br><br><br><br><br>
<strong><h3 align='center'>LECTURA DEL ARCHIVO SELECCIONADO</h3></strong>

<table border=2>

<?php

$registro=mysql_query("SELECT * from art_u WHERE ID_ART_U='$id'")    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

echo("<tr><td>ID</td><td>".$reg['ID_ART_U']."</td></tr>");
echo("<tr><td>TITULO</td><td>".$reg['TITULO']."</td></tr><tr><td>MATERIA:</td>");

	switch($reg['ID_MATERIA']){
		case 1:	echo "<td> SOLARIS </td>";break;
case 2:	echo "<td> JAVA </td>";break;
case 3:	echo "<td> .NET </td>";break;

case 4:	echo "<td> VIDEOJUEGOS </td>";break;
case 5:	echo "<td> REALIDAD AUMENTADA </td>";break;
case 6:	echo "<td> REALIDAD VIRTUAL </td>";break;

case 7:	echo "<td> DISEÑO DE INTERFACES </td>";break;
case 8:	echo "<td> SISTEMAS EMBEBIDOS </td>";break;
case 9:	echo "<td> AUT. CON MICROC. </td>";break;

case 10:	echo "<td> SEG. DE SOFTWARE </td>";break;
case 11:	echo "<td> SEG. DE REDES </td>";break;
case 12:	echo "<td> VIROLOGIA Y CRIPT. </td>";break;
}
echo("</tr><tr><td>CONTENIDO</td><td>".$reg['CUERPO']."</td></tr>");
echo("<tr><td>FECHA</td><td>".$reg['DAT']."</td></tr>");
echo("<tr><td>AUTOR</td><td>".$reg['PROPIETARIO']."</td></tr>");
echo("<tr><td>VOTOS</td><td>".$reg['VOTACION']."</td></tr>");

}
?>


</table>


<br>

<strong><h3 align='center'>AGREGA UN COMENTARIO</h3></strong>
<br>

<?php
echo("<form method=POST action=door.php>");
echo("ASUNTO:<input type=text name=asunto /><br>
COMENTARIO: <input type=text name=cuerpo /><br>
");


$tiempo=date('d-m-Y', $time);

echo("AUTOR:<input type=text  name='aut'  value='".$_SESSION['user']."' readonly /><br>");

echo("FECHA:<input type=text name='fecha'  value='".$tiempo."' readonly /><br>");

echo("ID DEL ARCHIVO: <input type=number name='ida'  value='".$id."'  readonly /><br>");

echo("
<input type=hidden value=1 name=can3 /><br>
<input type=submit value='AGREGA COMENTARIO' />
</form>");

?>


		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>
