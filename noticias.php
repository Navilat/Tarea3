<?php
session_start();
$id_area = $_SESSION['idarea'];

$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select * from noticia where id_area = ".$id_area."";
$res = pg_query($con, $sql);
$t = array();
while($reg = pg_fetch_assoc($res))
{
    $t[]=$reg;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Iniciar sesion</title>
</head>
<body>
<h1>Noticias: <?php echo $_SESSION['nombrearea']; ?></h1>
<?php
for($i=0;$i<sizeof($t);$i++)
{
    ?>
    <h3><?php echo $t[$i]["titulo"] ?></h3>
    <p><?php echo $t[$i]["contenido"] ?></p>
    <br /><br />
    <?php
}
?>
</body>
</html>