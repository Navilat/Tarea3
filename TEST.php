<?php
session_start();
$_SESSION['saludo'] = "hola";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Registrarse</title>
</head>
<body>
<form action="TEST2.php" method="post">
<input id="boton_prueba" value="TEST" type="submit"/>
</form>
</body>
</html>