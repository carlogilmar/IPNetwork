<?php

$id=$_GET['comentar']; //id a eliminar

//haciendo la consulta
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");

$reg=mysql_query("SELECT * FROM art_u WHERE ID_ART_U='$id'",$con);
mysql_query("DELETE FROM art_u WHERE ID_ART_U = '$id'" )
		 or die (mysql_error());

        header("location:index.php?seccion1=ELIMINADO");


?>

