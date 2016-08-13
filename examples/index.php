<body>

<form method="post" action="belinda.php">
<h1 align="center">AGREGAR A LA DB</h1><br>
Nombre: <input type="text" name="uno" />
Apellido: <input type="text" name="dos"/>
<input type="hidden" name="can1" value=1/>
<input type="submit" value="agregar" />
</form>
<hr>
<br>

<form method="post" action="belinda.php">
<h1 align="center">BUSCAR EN DB</h1><br>
Nombre: <input type="text" name="dos" />
<input type="hidden" name="can2" value=1/>
<input type="submit" value="buscar" />
</form>
<hr>
<br>

<form method="post" action="belinda.php">
<h1 align="center">MODIFICAR EN DB</h1><br>
En Nombre: <input type="text" name="tres" />
Modificar Apellido: <input type="text" name="cuatro"/>
<input type="hidden" name="can3" value=1/>
<input type="submit" value="modificar" />
</form>
<hr>
<br>

<form method="post" action="belinda.php">
<h1 align="center">ELIMINAR EN DB</h1><br>
Eliminar Nombre: <input type="text" name="cinco" />
<input type="hidden" name="can4" value=1/>
<input type="submit" value="eliminar" />
</form>
<hr>
<br>
<form method="post" action="belinda.php">
<h1 align="center">LEER DB</h1><br>
<input type="hidden" name="can5" value=1/>
<input type="submit" value="LEER DATOS DE LA DB" />
</form>
</body>
