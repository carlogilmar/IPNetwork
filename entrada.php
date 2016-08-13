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


<?php

session_start();
$time=time();
echo("<br><br><br><h1 align='center'>AGREGA UN NUEVO CONTENIDO :)</h1>");

echo("<form method=POST action=door.php>");

echo("<input type=text placeholder='TITULO' name=titulo /><br>
<textarea name=cuerpo placeholder='INSERTA AQUI EL CUERPO DE TU IDEA A APORTAR'></textarea><br>
<select name='materia'>

<option value='1'>SOLARIS</option>
<option value='2'>JAVA</option>
<option value='3'>NET</option>
<option value='4'>videojuegos</option>				
<option value='5'>realidad aumentada</option>
<option value='6'>realidad virtual</option>
<option value='7'>DISEÑO DE INTERFACES</option>
<option value='8'>SISTEMAS EMBEBIDOS</option>
<option value='9'>AUT CON MICROC</option>
<option value='10'>seguridad de software</option>
<option value='11'>seguridad de redes</option>
<option value='12'>virologia y criptologia</option>

								</select><br>
");


$tiempo=date('d-m-Y', $time);

echo("AUTOR:<input type=text  name='autor'  value='".$_SESSION['user']."' readonly /><br>");

echo("FECHA:<input type=text name='fecha'  value='".$tiempo."' readonly /><br>");


echo("
<input type=hidden value=1 name=can4 />
<input type=submit value='APORTAR CONTENIDO' />
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

