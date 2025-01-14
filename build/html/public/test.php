<?php
session_start();

$file = $_GET["file"];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    <h1>Bienvenue sur le Forum</h1>

    <p>Vous êtes maintenant connecté en tant qu'utilisateur authentifié.</p>

    <h2>Sections du Forum</h2>
    <ul>
        <?php
		echo "<p>THIPMTH2</p>";
		echo "<p> JE PRINT LE FILE JUSTE EN DESSOUS</p>";
		echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
		if (file_exists($file)){
			echo "<p>Nom du fichier que je trouve : " . $file. "</p>";
			echo "<p>".file_get_contents($file)."</p>";
		}
		else {
			echo "<p>not found</p>";
		}
	?>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
