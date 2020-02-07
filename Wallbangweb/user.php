<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Estilo.css" rel="stylesheet" type="text/css">
<title>Wallbang Studios</title>
</head>

<body>
<div id="Cabecera">
	<a href="Main.php" onClick="window.location.reload(true);" title="Wallbang">
	<img src="Logo.jpg" width="200" alt="Logo"></a>
    <div id="menuH">
    <ul class="nav">
    	<li><a href="Main.php" name="Home">HOME</a></li>
        <li><a href="Notices.php" name="NEWS">NEWS</a></li>
        <li><a href="About_us.php" name="About">ABOUT US</a></li>
        <li><a href="SHOP.php" name="Contact">SHOP</a></li>
        <?php 
        session_start();
        if (isset($_SESSION['usuario'])) {
            echo "
            <li><a href=\"user.php\" name=\"User\">".$_SESSION['usuario']."</a><ul><li>
            <div style=\"text-align: left;\">
            <fieldset style=\"background: #000;\">
            <form action=\"Main.php\" method=\"POST\" name=\"Logout\"><br>
            <input type=\"submit\" name=\"btn2\" value=\"Logout\">
            </form>
            </fieldset>
            </div>
            </ul></li></li>";
        }else{
            echo "
            <li><a name=\"Login\">LOGIN</a><ul><li>
            <div style=\"text-align: left;\">
            <fieldset style=\"background: #000;\">
            <form action=\"Main.php\" method=\"POST\" name=\"login\" align='center'><br>
            User:<br>
            <input type=\"text\" name=\"usuario\" placeholder=\"user\"><br><br>
            Password:<br>
            <input type=\"password\" name=\"clave\" placeholder=\"password\"><br><br>
            <input type=\"submit\" name=\"btn1\" value=\"Login\">
            </form>
            <form action=\"register.php\" align='center'>
            <input type=\"submit\" name=\"reg\" value=\"Register\">
            </form>
            </fieldset>
            </div>";
        }
                if (isset($_POST['btn2'])) {
                    session_destroy();
                    header("location: Main.php");
                }
            ?>
        </ul></li>
        </li>
    </ul>
    </div>    
</div>

<div id="Principal">
	<div id="Contenido">
    <div style="text-align: center;">
	<?php
	//si es el usuario que esta en esta pagina es el admin entonces tendra un menu diferente al usuario 
	if ($_SESSION['admin']==1) {
		echo "<form action= \"user.php\" method=\"POST\" name=\"botones\"> 
		<input type=\"submit\" name=\"Baneo\"    value=\"BAN\">
		<input type=\"submit\" name=\"aggptos\"  value=\"GIVE POINTS\">
		<input type=\"submit\" name=\"quitptos\" value=\"TAKE POINTS\">
		<input type=\"submit\" name=\"aggform\"  value=\"ADD REASON\">
		<input type=\"submit\" name=\"aggprod\"  value=\"ADD PRODUCT\">
		<input type=\"submit\" name=\"modprod\"  value=\"MOD PRODUCT\">
		<input type=\"submit\" name=\"buscaruser\"  value=\"SEARCH USER\">
		</form>";
	}
	else{
		//aqui se muestra el perfil del usuario y se hace un fetch del mismo usuario que se acumulo en el session
		include("abrirconexion.php");
		$resultados=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario='".$_SESSION['usuario']."'");
		while ($consulta=mysqli_fetch_array($resultados)) {
		echo "<h1>Profile</h1>";
		echo "<fieldset>";
		echo "<div style='padding: 0px 20% 0px 20%;'>";
		echo "<fieldset>";
		echo "<strong>USER: </strong>".$consulta['usuario']."<br>";
		echo "<strong>NAME: </strong>".$consulta['nombre']."<br>";
		echo "<strong>EMAIL: </strong>".$consulta['correo']."<br>";
		echo "<strong>COUNTRY: </strong>".$consulta['pais']."<br>";
		echo "<strong>Acumulated points: </strong>".$consulta['ptosac']."<br>";
		echo "</fieldset><br>";
		echo "</div>";
		echo "<div style='padding: 0px 20% 0px 20%;'>";
		echo "<fieldset>";
		echo "<p><strong>Products purshased:</strong></p>";
	}$resultados=mysqli_query($conexion,"SELECT compras.usuario,inventario.producto FROM compras,inventario WHERE compras.codprod=inventario.codprod AND usuario='".$_SESSION['usuario']."'");
	while ($consulta=mysqli_fetch_array($resultados)) {
		echo $consulta['producto']."<br>";
	}
	echo "</fieldset>";
	echo "</div>";
	echo "</fieldset>";
	include("cerrarconexion.php");
	}
	/*
		Aqui el menu completo del administrador, con sus distintas opciones para hacer las gestiones como capacidad de administrador
	*/
	echo "<form action='user.php' method='POST' name'acccion'>";
		if (isset($_POST['modprod'])) {
			echo "<fieldset>";
			include("abrirconexion.php");
			echo "<div style='text-align:center';'>";
			echo "Select product:";
			echo "</div>";
			echo "<fieldset>";
			echo "<select name='producto' placeholder='Select product'><br>";
			echo "</fieldset><br>";
			echo "<option value='#'>Select product</option>";
			$resultados=mysqli_query($conexion,"SELECT inventario.producto, inventario.codprod FROM inventario");
			while ($consulta=mysqli_fetch_array($resultados)) {
				echo "<option value=".$consulta['codprod'].">". $consulta['producto']." </option>";
			}
			echo "</select><br>";
			echo "</fieldset><br>";
			echo "<input type=\"submit\" name=\"modificarprod\" value=\"SEARCH\">";
			echo "</fieldset>";
			include("cerrarconexion.php");
		}
		if (isset($_POST['aggprod'])) {
			echo "<fieldset>";
			echo "<div style='text-align:center';'>";
			echo "Add the product name:";
			echo "</div>";
			echo "<fieldset>";
			echo "<input type='text' name='aggproducto' placeholder='Product name'><br>";
			echo "</fieldset><br>";
			echo "<div style='text-align:center';'>";
			echo "Add the number of required points:";
			echo "</div>";
			echo "<fieldset>";
			echo "<input type='text' name='puntos' placeholder='Required points'><br>";
			echo "</fieldset><br>";
			echo "<div style='text-align:center';'>";
			echo "Add the product quantity in stock:";
			echo "</div>";
			echo "<fieldset>";
			echo "<input type='text' name='stock' placeholder='Quantity in stock'><br>";
			echo "</fieldset><br>";
			echo "<input type=\"submit\" name=\"agregarprod\" value=\"ACCEPT\">";
			echo "</fieldset>";
		}
		if (isset($_POST['aggform'])) {
			echo "<fieldset>";
			echo "<div style='text-align:center';'>";
			echo "Add reason:";
			echo "</div>";
			echo "<fieldset>";
			echo "<input type='text' name='aggforma' placeholder='Add reason'><br>";
			echo "</fieldset><br>";
			echo "<div style='text-align:center';'>";
			echo "Add the quantity of points";
			echo "</div>";
			echo "<fieldset>";
			echo "<input type='text' name='puntos' placeholder='Add the points'><br>";
			echo "</fieldset><br>";
			echo "<input type=\"submit\" name=\"agregarform\" value=\"ACCEPT\">";
			echo "</fieldset>";
		}
		if (isset($_POST['Baneo'])){
	 	echo "<fieldset>";
		include("abrirconexion.php");
		echo "<div style='text-align:center';'>";
		echo "Select user to ban:<br>";
		echo "</div>";
		echo "<fieldset>";
		echo "<select name='usuarios' placeholder='Select user'>";
		echo "<option value='#'>Select user</option>";
		$resultados=mysqli_query($conexion,"SELECT usuario.usuario FROM usuario WHERE usuario.admin=0");
		while ($consulta=mysqli_fetch_array($resultados)) {
			echo "<option value=".$consulta['usuario'].">". $consulta['usuario']." </option>";
		}
		echo "</select><br>";
		echo "</fieldset><br>";
		echo "<input type='submit' name='banear' value='BAN'>";
		echo "</fieldset>";
		include("cerrarconexion.php");
		 }
		if (isset($_POST['aggptos'])) {
			echo "<fieldset>";
			include("abrirconexion.php");
			echo "<div style='text-align:center';'>";
			echo "Enter user:";
			echo "</div>";
			echo "<fieldset>";
			echo "<select name='usuarios' placeholder='Select user'>";
			echo "<option value='#'>Select user</option>";
			$resultados=mysqli_query($conexion,"SELECT usuario.usuario FROM usuario WHERE usuario.admin=0");
			while ($consulta=mysqli_fetch_array($resultados)) {
				echo "<option value=".$consulta['usuario'].">". $consulta['usuario']." </option>";
			}
			echo "</select><br>";
			echo "</fieldset><br>";
			echo "<div style='text-align:center';'>";
			echo "Enter reason:";
			echo "</div>";
			echo "<fieldset>";
			echo "<select name='formas' placeholder='Select reason'>";
			echo "<option value='#'>Select reason</option>";
			$resultados=mysqli_query($conexion,"SELECT*FROM formas WHERE formas.puntos>0");
			while ($consulta=mysqli_fetch_array($resultados)) {
				echo "<option value=".$consulta['codform'].">". $consulta['forma']."-- ".$consulta['puntos']."ptos </option>";
			}echo "</select><br>";
			echo "</fieldset><br>";
			echo "<input type='submit' name='agregar' value='ACCEPT'>";
			echo "</fieldset>";
			include("cerrarconexion.php");
		}
		if (isset($_POST['quitptos'])) {
			echo "<fieldset>";
			include("abrirconexion.php");
			echo "<div style='text-align:center';'>";
			echo "Enter user:";
			echo "</div>";
			echo "<fieldset>";
			echo "<select name='usuarios' placeholder='Select user'>";
			echo "<option value='#'>Select user</option>";
			$resultados=mysqli_query($conexion,"SELECT usuario.usuario FROM usuario WHERE usuario.admin=0");
			while ($consulta=mysqli_fetch_array($resultados)) {
				echo "<option value=".$consulta['usuario'].">". $consulta['usuario']." </option>";
			}
			echo "</select><br>";
			echo "</fieldset><br>";
			echo "<div style='text-align:center';'>";
			echo "Enter reason:";
			echo "</div>";
			echo "<fieldset>";
			echo "<select name='formas' placeholder='Select reason'>";
			echo "<option value='#'>Select reason</option>";
			$resultados=mysqli_query($conexion,"SELECT * FROM formas WHERE formas.puntos<0");
			while ($consulta=mysqli_fetch_array($resultados)) {
				echo "<option value=".$consulta['codform'].">". $consulta['forma']."-- ".$consulta['puntos']."ptos </option>";
			}
			echo "</select><br>";
			echo "</fieldset><br>";
			echo "<input type='submit' name='quitar' value='ACCEPT'>";
			echo "</fieldset>";
			include("cerrarconexion.php");
		}
	echo "</form>";
	if (isset($_POST['modificarprod'])) {
		echo "<form action= \"user.php\" method=\"POST\" name=\"modificar\"> ";
		include("abrirconexion.php");
		$producto=$_POST['producto'];
		$resultados=mysqli_query($conexion,"SELECT * FROM inventario WHERE inventario.codprod=$producto");
		while ($consulta=mysqli_fetch_array($resultados)) {
			echo "<input type='text' value=".$consulta['codprod']." name='codprod'>";
			echo "<input type='text' value=".$consulta['cantidad']." name='cantidad'>";
			echo "<input type ='text' value='".$consulta['producto']."' name='producto'>";
			echo "<input type ='text' value=".$consulta['ptosnec']." name='ptosnec'>";
		}
		echo "<input type='submit' name='modificar' value='SUMBIT'>";
		echo "</form>";
		include("cerrarconexion.php");
	}
	if (isset($_POST['banear'])) {
		$usuario=$_POST['usuarios'];
		include("abrirconexion.php");
		$conexion->query("DELETE FROM usuario WHERE usuario.usuario='$usuario'");
		echo "The user has been banned";
		include("cerrarconexion.php");
	} 
	if (isset($_POST['agregar'])) {
			$usuario=$_POST['usuarios'];
		$forma=$_POST['formas'];
		include("abrirconexion.php");
		$conexion->query("INSERT INTO puntos (forma,usuario) VALUES ('$forma','$usuario')");
		$resultados=mysqli_query($conexion,"SELECT usuario.usuario, usuario.ptosac,formas.codform, formas.puntos FROM usuario, formas WHERE usuario.usuario='$usuario' AND formas.codform=$forma");
		while ($consulta=mysqli_fetch_array($resultados)) {
			$ptostemp=$consulta['ptosac'];
			$ptosagg=$consulta['puntos'];
		}
		$newpoints=$ptostemp+$ptosagg;
		$conexion->query("UPDATE usuario SET usuario.ptosac=$newpoints WHERE usuario.usuario='$usuario'");
		echo "The points has given";
		include("cerrarconexion.php");

	}
	if (isset($_POST['quitar'])) {
			$usuario=$_POST['usuarios'];
		$forma=$_POST['formas'];
		include("abrirconexion.php");
		$conexion->query("INSERT INTO puntos (forma,usuario) VALUES ('$forma','$usuario')");
		$resultados=mysqli_query($conexion,"SELECT usuario.usuario, usuario.ptosac,formas.codform, formas.puntos FROM usuario, formas WHERE usuario.usuario='$usuario' AND formas.codform=$forma");
		while ($consulta=mysqli_fetch_array($resultados)) {
			$ptostemp=$consulta['ptosac'];
			$ptosagg=$consulta['puntos'];
		}
		$newpoints=$ptostemp+$ptosagg;
		$conexion->query("UPDATE usuario SET usuario.ptosac=$newpoints WHERE usuario.usuario='$usuario'");
		echo "The points has taken";
		include("cerrarconexion.php");
	}
	if (isset($_POST['agregarform'])) {
		$forma=$_POST['aggforma'];
		$puntos=$_POST['puntos'];
		include("abrirconexion.php");
		$conexion->query("INSERT INTO formas (forma,puntos) VALUES ('$forma','$puntos')");
		echo "The new reason has been added";
		include("cerrarconexion.php");
	}
	if (isset($_POST['agregarprod'])) {
		$producto=$_POST['aggproducto'];
		$puntos=$_POST['puntos'];
		$cantidad=$_POST['stock'];
		include("abrirconexion.php");
		$conexion->query("INSERT INTO inventario (producto,cantidad,ptosnec) VALUES ('$producto','$cantidad','$puntos')");
		echo "The new product has been added";
		include("cerrarconexion.php");
	}
	if (isset($_POST['modificar'])) {
		$cantidad=$_POST['cantidad'];
		$nombreprod=$_POST['producto'];
		$puntos=$_POST['ptosnec'];
		$codprod=$_POST['codprod'];
		include("abrirconexion.php");
		$conexion->query("UPDATE inventario SET producto='$nombreprod', cantidad=$cantidad, ptosnec=$puntos WHERE inventario.codprod=$codprod");
		echo "The product has been modified";
		include("cerrarconexion.php");
	}
	if (isset($_POST['buscaruser'])) {
		include("abrirconexion.php");
		echo '<fieldset>';
		echo "Select user:";
		echo '<table border=1 cellspacing=0 cellpadding=2 bordercolor="#000" align="center">
	<tr>
		<td><strong> USER:</strong></td>
		<td><strong> NAME:</strong></td>
		<td><strong> EMAIL:</strong></td>
		<td><strong> POINTS EARNED:</strong></td>
	</tr><form action="comprar.php" method="POST" name="login">';
	$resultados=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario.admin=0");
	while ($consulta=mysqli_fetch_array($resultados)) {
		echo "<tr>
			<td>".$consulta['usuario']."</td>
			<td>".$consulta['nombre']."</td>
			<td>".$consulta['correo']."</td>
			<td>".$consulta['ptosac']."</td>
			</tr>";
	}
	include("cerrarconexion.php");
	echo "</table>";
	echo "</fieldset>";
	}
	?>
    </div>
	</div>
</div>

<div id="Pie">
	<p><strong>Wallbang Studios 2017</strong></p>
    <p>IndieGoGo Campaign: Coming soon!</p><a href=""></a>
    <a href="https://www.facebook.com/Wallbang-Studios-1841124092842244/?ref=ts&fref=ts">
    <img src="F-icon.png" width="57" alt="Facebook_logo" class="img-valign"></a> 
    <a href="https://twitter.com/WallbangStudios">
    <img src="T-icon.png" width="57" alt="Twitter_logo" class="img-valign"></a>
    <a href="https://www.instagram.com/wallbangs1udios/">
    <img src="I-icon.png" width="57" alt="Instagram_logo" class="img-valign"></a>
</div>
</body>
</html>