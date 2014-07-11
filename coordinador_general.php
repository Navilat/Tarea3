<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Coordinador General</title>
</head>
<body>
<h2>Coordinador general:</h2><br />
<form action="publicar2.php" method="post">
Area:<select name="area_elegida">
<option>Coordinacion general</option>
<option>Tunel</option>
<option>Dinamicas</option>
<option>Concursos</option>
<option>Alimentacion</option>
<option>Registro visual</option>
<option>Audio</option>
</select><br />
Titulo:<input type="text" name="titulo"/><br />
<textarea name="cuerpo_noticia" rows="10" cols="40"></textarea><br />
<input id="publicar" value="Publicar noticia" type="submit"/>
</form>
<br /><br />
<form action="adminALLcolabs.php" method="post">
<input id="administrar_colabs" value="Administrar colaboradores" type="submit"/>
</form>
<form action="crear_coordinador.php" method="post">
<input id="crear_coords" value="Crear coordinador" type="submit"/>
</form>
</body>
</html>