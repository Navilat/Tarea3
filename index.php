<?php
require_once("class/class.php");
$tra = new Trabajo();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>INDEX</title>
</head>

<body>
<h1>HOLA MUNDO!</h1>
<?php
$a = $tra->get_area();
?>
<ul>
<?php
for($i=0;$i<sizeof($a);$i++)
{
?>    
<li><a href=""><?php echo $a[$i]["nombre"]; ?></a></li>  
<?php    
}
?>
</ul>
</body>

</html>