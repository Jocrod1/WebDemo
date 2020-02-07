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
    <h1 align="center">Shop</h1>
	<fieldset>
    <table border=1 cellspacing=0 cellpadding=2 bordercolor="#000" align="center">
    <tr>
        <td width="200px;"><strong> PRODUCT NAME: </strong></td>
        <td width="200px;"><strong> REQUIRED POINTS: </strong></td>
        <td width="200px;"><strong> IN-STOCK: </strong></td>
    </tr><form action="comprar.php" method="POST" name="login">
    <?php
        include("abrirconexion.php");
        $resultados=mysqli_query($conexion,"SELECT * FROM inventario WHERE inventario.cantidad>0");
        while ($consulta=mysqli_fetch_array($resultados)){
            echo "<tr>
            <td>".$consulta['producto']."</td>
            <td>".$consulta['ptosnec']."</td>
            <td>".$consulta['cantidad']."</td>";
            if (isset($_SESSION['usuario'])) {
                echo"<td><input type='submit' name='".$consulta['codprod']."' value='BUY'></td>
                </tr>";
            }
        }
        echo "</form>";
        include("cerrarconexion.php");
    ?>
</table>
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
