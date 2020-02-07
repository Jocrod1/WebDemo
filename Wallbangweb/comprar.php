<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
$usuariosession=$_SESSION['usuario'];
include("abrirconexion.php");
$resultados=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario.usuario='$usuariosession'");
while ($consulta=mysqli_fetch_array($resultados)){
$usuario=$consulta['usuario'];
$ptos=$consulta['ptosac'];
}
$resultados=mysqli_query($conexion,"SELECT * FROM inventario");
while ($consulta=mysqli_fetch_array($resultados)) {
	if (isset($_POST[''.$consulta['codprod'].''])) {
		$producto=$consulta['producto'];
		$ptosnec=$consulta['ptosnec'];
		$stock=$consulta['cantidad'];
		$codprod=$consulta['codprod'];
}
}
$newptos=$ptos-$ptosnec;
echo "<br>";
echo "<table border=1 cellspacing=0 cellpadding=2 bordercolor=\"#000\" align='center'>
	<tr>
		<td> Usuario</td>
		<td> $usuario </td>
	</tr>
	<tr>
		<td> Select product</td>
		<td> $producto </td>
	</tr>
	<tr>
		<td> In Stock</td>
		<td> $stock </td>
	</tr>
	<tr>
		<td> Acumulated points</td>
		<td> $ptos </td>
	</tr>
	<tr>
		<td> Required points</td>
		<td> $ptosnec </td>
	</tr>
	<tr>
		<td> Points left</td>
		<td> $newptos </td>
	</tr>
</table><br>";

$newstock=$stock-1;
if ($newptos>=0) {
	echo "<form action=\"comprar.php\" method=\"POST\" name=\"comprar\" align='center'>
	<input type=\"submit\" name=\"comprar\"    value=\"Comprar\">
	<input type=\"text\" name=\"puntos\" value='".$newptos."' hidden=\"true\">
	<input type=\"text\" name=\"codprod\" value='".$codprod."' hidden=\"true\">
	<input type=\"text\" name=\"usuario\" value='".$usuario."' hidden=\"true\">
	<input type=\"text\" name=\"stock\" value='".$newstock."' hidden=\"true\">
	</form>";
}
else{
	echo "Tus puntos no alcanzan para la compra";
}
if (isset($_POST['comprar'])) {
	$puntos=$_POST['puntos'];
	$codprod=$_POST['codprod'];
	$usuario=$_POST['usuario'];
	$stock=$_POST['stock'];
	$conexion->query("INSERT INTO compras (codprod,usuario) VALUES ('$codprod','$usuario')");
	$conexion->query("UPDATE inventario SET inventario.cantidad=$stock WHERE inventario.codprod=$codprod ");
	$conexion->query("UPDATE usuario SET usuario.ptosac=$puntos WHERE usuario.usuario='$usuario'");
	echo "Se ha registrado exitosamente";
	header("location: user.php");
	include("cerrarconexion.php");
	}



?>
</body>
</html>