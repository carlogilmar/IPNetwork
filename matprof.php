<?php

//conexion a la db
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");
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


<br><br><br><br>
<strong><h3 align="center">CONSULTA LOS PROFESORES Y MATERIAS DISPONIBLES</h3></strong><br>
<h1 align="center">DISPONIBILIDAD DE MATERIAS EN UPIICSA</h1>
</p>

<table align="center" width="100%">
<tr><td align="center"><strong>MATERIA</strong></td><td align="center"><b>TURNO MATUTINO</b></td><td align="center"><b>TURNO VESPERTINO</b></td><td align="center"><b>ACADEMIA</b></td><tr>

<?php

$registro=mysql_query("SELECT * from materias")    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

	echo("<tr><td align='center'>".$reg['NOMBRE_MATERIA']."</td>");
	if($reg['HM'] == TRUE){  echo("<td align='center'>DISPONIBLE</td>");  }else echo("<td align='center'>NO DISPONIBLE</td>");
	if($reg['HV'] == TRUE){  echo("<td align='center'>DISPONIBLE</td>");  }else echo("<td align='center'>NO DISPONIBLE</td>");
 	echo("<td align='center'>".$reg['ACADEMIA']."</td></tr>");

    }

?>


</table>
<BR><BR>

<h1 align='center'>DISPONIBILIDAD DE PROFESORES EN UPIICSA</h1>
<table align='center'>
<tr><td align='center'><b>NOMBRE</b></td><td align='center'><b>APELLIDO</b></td><td align='center'><b>TITULO</b></td></tr>


<?php

$registro=mysql_query("SELECT * from profesores")    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

	echo("<tr><td align='center'>".$reg['NOMBRE_PROFESOR']."</td>");
	echo("<td align='center'>".$reg['APELLITO_PROFESOR']."</td>");
	echo("<td align='center'>".$reg['TITULO']."</td></tr>");

    }

?>

</table>
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
