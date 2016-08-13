<?php


//haciendo la consulta
$a=mysql_connect("localhost","root","admin")or die("problemas al conectar a MYSQL");
mysql_select_db("ipnetwork",$a)or die("checar conexion");

 $registro=mysql_query("SELECT * from art_u")
    or die ("problemas en consulta: ".mysql_error());


echo("<br><br><h2 align='center'> ARCHIVO GENERAL</h2><br>");
echo("<br><table align='center' border=2>");
echo("<tr><td align='center'>ID</td><td align='center'>TITULO</td><td align='center'>CUERPO</td><td align='center'>AUTOR</td></tr>");


    //recuperando los datos de una base de datos
    while($reg=mysql_fetch_array($registro)){

echo("<tr><td align='center'>".$reg['ID_ART_U']."</td>"); 
echo("<td align='center'>".$reg['TITULO']."</td>");  
echo("<td align='center'>".$reg['CUERPO']."</td>");
echo("<td align='center'>".$reg['PROPIETARIO']."</td></tr>");

    }
echo("</table>");






?>