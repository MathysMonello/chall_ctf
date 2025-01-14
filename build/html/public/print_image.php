<?php
	session_start();
	$img = "../images_boreales/".$_GET["img"];

	//Retourne vrai si l'utilisateur essaie d'accéder à un répertoire interdit
function verifyDir($img) {
    $restricted_dir = realpath('/var/www/html/public');

    if (strpos(realpath($img), $restricted_dir) === 0) {
	echo strpos(realpath($img), $restricted_dir);
        return true; 
    }
    return false;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="image.css">
    <title>Image d'aurore boréale</title>
</head>
<body>
	<div>
	<?php 
		if (verifyDir($img)) {
    			echo "<p>Accès interdit à ce répertoire !</p>";
    			exit();   
		} 

		else { if (file_exists($img)){
			if (str_contains($img, 'jpg')){
				echo "<img src='$img' width='500px' height='500px'>";
			}
			else {
				echo "<p> img not found</p>";
				echo file_get_contents($img);
			}
		}
		else {
			echo "<p> File not found</p>";
		}
		}
	?>
	</div>
</body>
</html>
