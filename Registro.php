<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Registrarse</title>
</head>
<body>
<h2>Registro de colaboradores:</h2>
<p>Por favor complete los campos a continuacion</p>
<?php

?>
<form action="Postular.php" method="post">
Nombre: <input type="text" name="nombre"/><br />
Rol: <input type="text" name="rol"/><br />
Rut: <input type="text" name="rut"/><br />
Correo: <input type="text" name="correo"/><br />
Contrasenia: <input type="password" name="pass"/><br />
Confirmar contrasenia: <input type="password" name="pass_conf"/><br />
Campus:<select name="campus">
<option>San Joaquin</option>
<option>Vitacura</option>
</select><br />
Carrera:<select name="carrera">
<option>Informatica</option>
<option>Industrial</option>
</select><br />
Talla:<select name="talla">
<option>S</option>
<option>M</option>
<option>L</option>
<option>XL</option>
<option>XXL</option>
</select> (Este campo puede ser modificado luego)<br /><br />
<input id="boton" value="Continuar" type="submit"/>
</form>

</body>
</html>
