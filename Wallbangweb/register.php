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
    <h1 align="center">Register</h1>
    <fieldset>    
    <form action="register.php" method="POST" name="registro"> 
	User: <br>
	<input type="text" name="usuario" size="20" placeholder="Max 20 Characters..."  maxlength="20" style="font-family: Times new roman; font-size: 12pt"><br><br>
	Password: <br>
	<input type="password" name="clave" size="20" placeholder="Password"  maxlength="20" style="font-family:  Times new roman; font-size: 12pt"><br><br>
	<input type="password" name="clave2" size="20" placeholder="Confirm password"  maxlength="20" style="font-family:  Times new roman; font-size: 12pt"><br><br>
	Name: <br>
	<input type="text" name="nombre" size="20" placeholder="Name"  maxlength="40" style="font-family:  Times new roman; font-size: 12pt"><br><br>
	Email: <br>
	<input type="text" name="correo" size="20" placeholder="Email"  maxlength="50" style="font-family:  Times new roman; font-size: 12pt"><br><br>
	Country: <br>
	<select name="pais" style="font-family:  Times new roman; font-size: 12pt"><br></h3>
	<option value="#">Select your country</option>
	<?php
	include("abrirconexion.php");
	$resultados=mysqli_query($conexion,"SELECT paises.nombre FROM paises");
	while ($consulta=mysqli_fetch_array($resultados)) {
		echo "<option value=".$consulta['nombre'].">". $consulta['nombre']." </option>";
	}
	echo "</select> ";
	echo "<br><br><input type=\"submit\" name=\"registrar\" value=\"ACCEPT\">
	<input type= \"reset\" name= \"reset\"  value=\"CLEAN\"></form></h5>";
	if (isset($_POST['registrar']))
	{
		$usuario=$_POST['usuario'];
		$clave1=$_POST['clave'];
		$clave2=$_POST['clave2'];
		$nombre=$_POST['nombre'];
		$correo=$_POST['correo'];
		$pais=$_POST['pais'];
		function verificarcorreo($correo_verificar)
	{
   		$Sintaxis="#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#";
   		if(preg_match($Sintaxis,$correo_verificar))
   	    	return true;
   		else
   		    return false;
	}
	if ((empty($usuario)) || (empty($clave1))  || (empty($clave2)) || (empty($nombre)) || (empty($correo)) || ($pais=="#"))
	{
		echo "Error, there's an empty box";
	}	
	else{
		if (strpos($usuario, " "))
			{
			echo "Error, the user can't contain spaces";
			}
			else
			{
				if (strpos($clave1, " "))
				{
					echo "Error, the password cant contain spaces";
				}
				else
				{
					if ($clave1 == $clave2)
					{
						if (verificarcorreo($correo))
						{
							$boolerror=false;
						$resultados=mysqli_query($conexion,"SELECT usuario.usuario FROM usuario");
						while ($consulta=mysqli_fetch_array($resultados)) {
							if ($usuario==$consulta['usuario']) {
								$boolerror=true;
							}
						}
						if ($boolerror==true) {
							echo "ERROR the user already  exists";
						} else{
							$conexion->query("INSERT INTO usuario (usuario,clave,nombre,correo,pais) VALUES ('$usuario','$clave1','$nombre','$correo','$pais')");
						echo "You has been registered";
						header("location: login.php");
						}
						include("cerrarconexion.php");
						}
						else
						{
							echo "Invalid email";
							echo "<br>";
							echo "<br>";
						}
					}
					else
					{ 		
						echo "The password doesn't match";
						echo "<br>";
						echo "<br>";
						echo "<br>";
					}
				}
			}
		}
	}
	?>
	</fieldset>
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