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
        /*
            Si el usuario esta logeado entonces aparece el nombre de lo usuario 
            En cambio, si el usuario no esta logeado entonces que aparezca las opciones de validadciones
        */
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
            //este es el login
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
    <p align="center"><strong>This is the official website of Wallbang!</strong></p><br>
	<p align="justify">Wallbang Studios is an independent group, that’s also starting in the industry thanks to their actual project. Because of that, the availability of a web site that adapts to your needs and counts with a good performance is important; since the use of it could bring long term benefits for the project; either in the economic field (by increasing the followers, there would be more sells) or the feedback (which might produce modifications in the development of the project, giving at the end a better product). Besides, it is important to stand out that as development that seeks to be a joint of development of both the follower and the developer, the use of didactic tools such as accumulation of scores can bring special benefits to the most active followers and at the same time encourage greater participation by third parties, resulting in a rewarding advertising mechanism.</P>
    <?php

                if (isset($_POST['btn1'])) {
                    //validaciones del login 
                    $usuario=$_POST['usuario'];
                    $clave=$_POST['clave'];
                    include("abrirconexion.php");
                    //se hace un query para solicitar los datos del usuario que ingreso la persona
                    $resultados=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario.usuario='$usuario'");
                    while ($consulta=mysqli_fetch_array($resultados)) {
                        $admin=$consulta['admin'];
                        $claveprueba=$consulta['clave'];
                    }
                    //si el usario esta vacio y/o la clave este lo dira
                    if (empty($usuario)) {
                        echo "The user is empty";
                    }elseif (empty($clave)) {
                        echo "The password is empty";
                    }
                    else{
                        //la confirmacion de los datos ingresados con los de la tabla
                        if ($clave==$claveprueba) {
                            $_SESSION['usuario']=$usuario;
                            $_SESSION['admin']=$admin;
                            header("location: main.php");
                        }elseif ($clave!=$claveprueba) {
                            echo "Some boxes are wrong, please try again";
                        }
                    }
                    include("cerrarconexion.php");
                }
    ?>

    
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
