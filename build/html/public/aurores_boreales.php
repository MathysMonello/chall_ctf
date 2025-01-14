<?php

	session_start();


    // Cette fonction permet de protéger le fichier private/passwd
	function getImages($dir){
		return scandir($dir);
	}

	$_IMG = getImages("../images_boreales"); 

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aurores.css">
    <title>Forum</title>
</head>
<body> 
    <div id=glass></div>
    <main>
        <h1>Bienvenue dans la section Aurores boréales</h1>

        <p>Dernières publications</p>

        <ul>
            <?php
            foreach ($_IMG as $img):
                echo "<li><a href='print_image.php?img=$img'>$img</a></li>";
            endforeach;
            ?>
        </ul>
        <a href="logout.php">Se déconnecter</a>
    </main>
</body>
</html>

