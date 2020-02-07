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
    <fieldset style="border-color: #CCFFFF">
    <h1>Programming</h1>
	<p align="justify">
    Hello again! At this point, im going to talk about what i do in the Project. In Wallbang Studios I’m the programmer… apart of drive and manage the project.<br><br>
    <h1 align="center"><img src="banner.png"></h1><br>
    Well, programming it’s the logic part of the game; in fact, the videogames were created from programming. Being a programmer isn’t complex, it has to have patience and creativity for the solutions of the problems (the programmers don’t know all, sometimes we search source code for help)<br><br>

    If you already know how’s the solution of all the problems, in less than an hour you’ll have programmed the game, and if the game it’s a triple A in less than a week. But, we’re humans and Indies developers super creative’s and we like to create something never saw.<br> 
    Bad luck… In fact, in some new problem you try to solve it with what you know (math, functions, methods, objects…) for later optimize it.<br><br>

    Our game is being created with Unity, the best tool in our case. Unity uses different programming languages; for the shaders there’s a exclusive language, with the logic part Unity uses 2 programming languages… C# and JavaScript, any of these is good in off for a basic game<br><br>

    With the logic for itself, it depends of the skill of the programmer and his knowing about the language<br><br>

    <strong>If you want to program something, first you have to dream it.</strong><br><br>

    <strong>-José Pereira, Programmer.</strong></p>
    </fieldset><br><br>

    <fieldset style="border-color: #CCFFFF">
    <h1>Begin</h1>
    <P align="justify">
    Before I was talking about studying and working at the same time it´s hard, but the key of all is begin.<br><br>

    If you have seen the publishing’s in the facebook and Twitter pages, you´ll see the first concept of the game dev. In that moment, we are beginning… Conceptualize the ideas and administrate them when it´s more than 5 people isn´t an easy work.<br><br>

    Oh, hi! Forget say hello… well, it´s easy create an idea when it´s only one person, if you write and draw that you create to remember all that stuff, all will be perfect. But, when it´s more people is complicated.<br> 
    The simple thing of not talk clearly will have a fatal confusion. For that, the team has to write all the ideas of the moment, to not forget it and show it in the team discussion. The ideas have to be clearly writhed and specified.<br> 
    Also, the team has to write the definitive ideas, after discuss it, the better ideas will be<br><br>

    <h1 align="center"><img src="f2.jpg"></h1><br>
    in the moment of the ideas and discuss it, the team has to have some designer that makes the drawnings of the ideas  (characters, scenes, objects…) for the concepts art. Having a creative ambient and also all can opine and give ideas with liberty it´s important, all the team has to give an idea or an opinion.<br><br>

    <h1 align="center"><img src="f3.jpg"></h1><br>
    Beginning for some people can be the easy and fun part, because it´s the creation process, define concepts, write histories, talk about mechanics. But, after you create all the stuff, it has to develop, for that it has to have someone who drives all the team.<br> 
    In the beginning was some just text and simple drawings, working and make the game reality it´s the main goal… may look obvious, but it´s easy lose the way after that or even get desmotivated. For that there’s the leader, to guide to the goal.<br><br>

    <strong>Never let dreaming, because one time, when we were kids, we dreamed.</strong><br><br>

    <strong>–José Pereira, Little dreamer.</strong>
    </P>
    </fieldset><br><br>
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
