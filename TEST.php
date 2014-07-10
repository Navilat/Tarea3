<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>TEST</title>
</head>

<body>
<ul>
<?php
$cadena = "host = 'localhost' port = '5432' dbname = 'postgres' user = 'postgres' password = '123'";
$con = pg_connect($cadena) or die (' :( Error de conexion!');

$sql = "select * from Area";
$res = pg_query($con,$sql);

$t = array();
while($reg = pg_fetch_assoc($res))
{
    $t[]=$reg;
}
for($i=0;$i<sizeof($t);$i++)
{
?>
<li><a href=""><?php echo $t[$i]["nombre"]; ?></a></li> 
 <?php
}
?>
 
</ul>
</body>
</html>