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
		<h1 align="center">About us</h1>
		<p>Wallbang Studios it’s a project created in Venezuela by Jose Pereira with the idea of making a videogame, currently we’re 6 working on a Wallbang’s videogame.
    	<br>
		<p><strong>Members:</strong></p>
		<ol>Raimon Koudsi (Venezuela) – Writer.</ol>
        <ol>Carlos Edesio (Venezuela) – Director/Designer.</ol>
        <ol>Mirla Montaño (Venezuela) – Designer.</ol>
        <ol>Pamela Medina (Mexico) – Designer.</ol>
        <ol>Robert Nekrasov (Spain) – Composer.</ol>
        <ol>José Pereira (Venezuela) – CEO/Programmer.</ol>
    	<br>
		We’re making a game, for more information of our project visit the notice section! We’re publishing info and also we talk about the experience of making a game.</p>
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