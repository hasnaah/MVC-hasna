<?php require '../controller/command.php'; ?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<title>Pizzeria de la plage</title>
</head>
<body>
<header>
        <nav class="menus1">		
            <label class="tel"><a href="tel:+33600000000"> 0600000000</a></label>
            <ul>
                <li><a href="./panier.html">Panier</a></li>
                <li><a href="./carte.html">Carte</a></li>
                <li><a href="./index.html">Accueil</a></li>
            </ul>            
        </nav>        
	  <nav class="menus2">
        	<label class="tel"><a href="tel:+33600000000">✆</a></label>	
			<ul class="menuDeroulant">
				<li class="menuBurger">☰</li>  
				<li><a href="./panier.html">Panier</a></li>
				<li><a href="./carte.html">Carte</a></li>
				<li><a href="./index.html">Accueil</a></li>
			</ul> 

        </nav>
	  <a href="./index.html"><img class="pizza" src="./img/pizza.png" alt="logo"></a>
    </header>
    <main>
    <?php $command->exect();?>
    </main>
    <footer>
        <div class="icons"><a href="https://www.google.fr/maps/place/2+Av.+de+Montredon,+13008+Marseille/@43.2453546,5.372393,19z/data=!4m8!1m2!2m1!1s1+plage+du+prado!3m4!1s0x12c9c70b3322b68b:0x3aa8471c8973edd2!8m2!3d43.2453536!4d5.3729402">⚲</a><a href="mailto:pizzeriadelaplage@gmail.com">✉</a></div>
    </footer>
</body>
</html>