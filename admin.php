<?php

$su=$_POST['user'];
$p=$_POST['pw'];

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ADMINISTRADOR</title>
<style type="text/css">

body{
	background-color:#000;
	margin-top:50px;
	background-image:
	radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 10px),
	radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 10px),
	radial-gradient(white, rgba(255,255,255,.1) 2px, transparent 10px);
	background-size: 550px 550px,430px 430px,230px 230px; 
	background-position: 500px 2000px,400px 600px,400px 200px;
}

#solar-system{
	position:relative;
	margin:auto;
	width:600px;
	height:600px;
	overflow:hidden;
	padding:50px;
}

#neptune-circle{
	position:absolute;
	width:600px;
	height:600px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	animation: rotation 70s linear infinite;
}

#neptune-circle:after{
	position:absolute;
	width:10px;
	height:7px;
	border-radius:100%;
	background-color:#00F;
	border-color:#00009B;
	border-style:solid;
	border-width: 4px 1px 1px 1px;
	content:'';
	left:300px;
	top:-5px;
}

#uranus-circle{
	position:absolute;
	width:530px;
	height:530px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:85px;
	top:85px;
	animation: rotation 60s linear infinite;
}

#uranus-circle:after{
	position:absolute;
	width:12px;
	height:9px;
	border-radius:100%;
	border-color:#005353;
	border-style:solid;
	border-width: 4px 1px 1px 1px;
	background-color:#00B9B9;
	content:'';
	left:265px;
	top:-7px;
}

#saturn-circle{
	position:absolute;
	width:460px;
	height:460px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:120px;
	top:120px;
	animation: rotation 50s linear infinite;
}

#saturn-circle:before{
	position:absolute;
	width:13px;
	height:9px;
	border-radius:100%;
	background-color:#C0C0C0;
	border-color:#838383;
	border-style:solid;
	border-width: 5px 1px 1px 1px;
	content:'';
	left:230px;
	top:-6px;
}

#saturn-circle:after{
	
	position:absolute;
	width:25px;
	height:5px;
	border-radius:100%;
	background-color:rgba(0,0,0,0);
	border-color:#838383;
	border-style:solid;
	border-width: 1px 1px 3px 1px;
	content:'';
	left:224px;
	top:-2px;
	
}

#jupiter-circle{
	position:absolute;
	width:360px;
	height:360px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:170px;
	top:170px;
	animation: rotation 40s linear infinite;
}

#jupiter-circle:after{
	position:absolute;
	width:20px;
	height:15px;
	border-radius:100%;
	background-color:#F60;
	border-color:#630;
	border-style:solid;
	border-width: 6px 1px 1px 1px;
	content:'';
	left:170px;
	top:-10px;
}

#mars-circle{
	position:absolute;
	width:200px;
	height:200px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:250px;
	top:250px;
	animation: rotation 30s linear infinite;
}

#mars-circle:after{
	position:absolute;
	width:8px;
	height:6px;
	border-radius:100%;
	background-color:#B00000;
	border-color:#600;
	border-style:solid;
	border-width: 3px 1px 1px 1px;
	content:'';
	left:100px;
	top:-5px;
}

#earth-circle{
	position:absolute;
	width:150px;
	height:150px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:275px;
	top:275px;
	animation: rotation 20s linear infinite;
}

#earth-circle:before{
	position:absolute;
	width:4px;
	height:4px;
	border-radius:100%;
	background-color:#CCC;
	content:'';
	left:66px;
	top:-2px;
	transform-origin:15px;
	animation: rotation 2s linear infinite;
}

#earth-circle:after{
	position:absolute;
	width:8px;
	height:6px;
	border-radius:100%;
	background-color:#0058B0;
	border-color:#00366C;
	border-style:solid;
	border-width: 3px 1px 1px 1px;
	content:'';
	left:75px;
	top:-5px;
}



#venus-circle{
	position:absolute;
	width:100px;
	height:100px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:300px;
	top:300px;
	animation: rotation 10s linear infinite;
}

#venus-circle:after{
	position:absolute;
	width:9px;
	height:6px;
	border-radius:100%;
	background-color:#FFD3A8;
	border-color:#FFA579;
	border-style:solid;
	border-width: 4px 1px 1px 1px;
	content:'';
	left:50px;
	top:-6px;
}

#mercury-circle{
	position:absolute;
	width:70px;
	height:70px;
	background-color:rgba(0,0,0,0);
	border: 1px solid #111;
	border-radius:100%;
	left:315px;
	top:315px;
	animation: rotation 5s linear infinite;
}

#mercury-circle:after{
	position:absolute;
	width:5px;
	height:4px;
	border-radius:100%;
	background-color:#713800;
	border-color:#623100;
	border-style:solid;
	border-width: 2px 1px 1px 1px;
	content:'';
	left:35px;
	top:-3px;
}

#sun{
	position:absolute;
	width:40px;
	height:40px;
	background-color:#F90;
	border-radius:100%;
	left:330px;
	top:330px;
	background:radial-gradient(circle, #F60, #FC0);
	box-shadow:0px 0px 50px #F90;
	animation: sun-shadow 2s ease infinite;
}

@keyframes rotation {
 from {transform: rotate(0deg);}
 to {transform: rotate(-360deg);}
}

@keyframes sun-shadow {
 0% {box-shadow:0px 0px 20px #F90;}
 50% {box-shadow:0px 0px 50px #F90;}
 100% {box-shadow:0px 0px 20px #F90;}
}

</style>
</head>
<body>

<?php




if (isset($_POST['can']) && !empty($_POST['can'])){

if($su == "carlo" || $su == "mario" || $su == "diana"){ //su 
echo("<h2 style='margin:15px;text-align:center;font-size:30px;color:#FFF;'>BIENVENIDO SEAS ADMINISTRADOR: ".$su."</h2>");
ECHO("<br><br>");
echo("<br><hr bgcolor=white/><br> <h4 align='center'>
<a href='usuarios.sql' >RESPALDO DE USUARIOS</a><BR><BR>
<a href='archivos.sql' >RESPALDO DE ARCHIVOS</a><BR><BR>");

//haciendo la consulta
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");


$i=0;

    $registro=mysql_query("SELECT * from estudiante")
    or die ("problemas en consulta: ".mysql_error());

$fi=fopen("usuarios.sql", "a") or die("problemas al crear archivo");


    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

echo("<tr><td align='center'>".$reg['ID_ESTUDIANTE']."</td>"); 
echo("<td align='center'>".$reg['USER']."</td>");  
echo("<td align='center'>".$reg['NOMBRE']." ".$reg['APELLIDO']."</td>");
echo("<td align='center'>".$reg['LINEA']."</td><td>USUARIO ESTUDIANTE</td></tr>");

fwrite($fi, $reg['ID_ESTUDIANTE'] .PHP_EOL);
fwrite($fi, $reg['USER'].PHP_EOL);
fwrite($fi, $reg['NOMBRE'].PHP_EOL);
fwrite($fi, $reg['LINEA'].PHP_EOL);

    }
echo("</table>");
fclose($fi);

ECHO("<br><br>");ECHO("<br><br>");
//---------------------------------------------------------------------------LECTURA DE LA DB

 $registro=mysql_query("SELECT * from art_u")
    or die ("problemas en consulta: ".mysql_error());

$fi=fopen("archivos.sql", "a") or die("problemas al crear archivo");
echo("</br>");
echo("<FONT SIZE=5 COLOR=white><h2 align='center'> ARCHIVO GENERAL</h2> </font><br>");
echo("<br><table align='center' border=2 bgcolor='white'>");
echo("<tr><td align='center'>ID</td><td align='center'>TITULO</td><td align='center'>CUERPO</td><td align='center'>AUTOR</td></tr>");


    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

echo("<tr><td align='center'>".$reg['ID_ART_U']."</td>"); 
echo("<td align='center'>".$reg['TITULO']."</td>");  
echo("<td align='center'>".$reg['CUERPO']."</td>");
echo("<td align='center'>".$reg['PROPIETARIO']."</td></tr>");

fwrite($fi, $reg['ID_ART_U'] .PHP_EOL);
fwrite($fi, $reg['TITULO'].PHP_EOL);
fwrite($fi, $reg['CUERPO'].PHP_EOL);
fwrite($fi, $reg['PROPIETARIO'].PHP_EOL);

    }
echo("</table>");
fclose($fi);

//lectura de materias y profesores--------------------------------------------------------------
 $registro=mysql_query("SELECT * from materias")
    or die ("problemas en consulta: ".mysql_error());

$fi=fopen("materiasyprofesores.sql", "a") or die("problemas al crear archivo");
echo("</br>");
echo("<FONT SIZE=5 COLOR=white><h2 align='center'> PROFESORES </h2> </font><br>");
echo("<br><table align='center' border=2 bgcolor='white'>");
echo("<tr><td align='center'><b>NOMBRE</b></td><td align='center'><b>APELLIDO</b></td><td align='center'><b>TITULO</b></td></tr>");

$registro=mysql_query("SELECT * from profesores")    or die ("problemas en consulta: ".mysql_error());
    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

	echo("<tr><td align='center'>".$reg['NOMBRE_PROFESOR']."</td>");
	echo("<td align='center'>".$reg['APELLITO_PROFESOR']."</td>");
	echo("<td align='center'>".$reg['TITULO']."</td></tr>");

fwrite($fi, $reg['ID_PROFESOR'].PHP_EOL);
fwrite($fi, $reg['NOMBRE_PROFESOR'] .PHP_EOL);
fwrite($fi, $reg['APELLITO_PROFESOR'].PHP_EOL);
fwrite($fi, $reg['TITULO'].PHP_EOL);

    }
echo("</table>");

echo("<FONT SIZE=5 COLOR=white><h2 align='center'> MATERIAS </h2> </font>");
echo("<br><table align='center' border=2 bgcolor='white'>");
echo("<tr><td align='center'><strong>MATERIA</strong></td><td align='center'><b>TURNO MATUTINO</b></td><td align='center'><b>TURNO VESPERTINO</b></td><td align='center'><b>ACADEMIA</b></td><tr>");

$registro=mysql_query("SELECT * from materias")    or die ("problemas en consulta: ".mysql_error());

    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

	echo("<tr><td align='center'>".$reg['NOMBRE_MATERIA']."</td>");
	if($reg['HM'] == TRUE){  echo("<td align='center'>DISPONIBLE</td>");  }else echo("<td align='center'>NO DISPONIBLE</td>");
	if($reg['HV'] == TRUE){  echo("<td align='center'>DISPONIBLE</td>");  }else echo("<td align='center'>NO DISPONIBLE</td>");
 	echo("<td align='center'>".$reg['ACADEMIA']."</td></tr>");

fwrite($fi, $reg['ID_MATERIA'].PHP_EOL);
fwrite($fi, $reg['NOMBRE_MATERIA'] .PHP_EOL);
fwrite($fi, $reg['HM'].PHP_EOL);
fwrite($fi, $reg['HV'].PHP_EOL);
fwrite($fi, $reg['ACADEMIA'].PHP_EOL);

    }

ECHO("<br><br>");

fclose($fi);



}//su



}//entrnado por log

else{
echo("<h2 style='margin:15px;text-align:center;font-size:30px;color:#FFF;'>ENTRANDO COMO ADMINISTRADOR</h2>
<h1 align='center'><form method='POST' action='admin.php'><input type=hidden name=can value='1' /><input type=text name=user placeholder='USUARIO DE ADMIN' /> <input type=password name=p placeholder='PASSWORD DE ADMIN'/><input type=submit value='INGRESAR' /></form></h1>
");

}


?>


<!-- Heading/Title -->

<div style="width:100%;text-align:center;">

</div>
<!-- end -->
</body>
</html>
