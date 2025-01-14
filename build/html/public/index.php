<?php
session_start();

$cle_correcte = "12345";

if (isset($_POST['submit'])) {
    $cle_saisie = $_POST['cle'];

    if ($cle_saisie === $cle_correcte) {
        $_SESSION['auth'] = true;
        $_SESSION['cle'] = $cle_saisie; 


        header("Location: forum.php");
        exit();
    } else {
        $erreur = "Clé incorrecte. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASTEROID FAN CLUB</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 class="glow">ASTEROÏD FAN CLUB</h1>
    <h3>Prouve ta valeur en conduisant le vaisseau du captain Morgan 
        au dela des cieux et tu pourras accéder au club très select des fans d'asteroid 
        <a href="http://localhost:8081">ICI</a></h3>


    <?php if (isset($erreur)) : ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <label for="cle">Insérer la clé</label>
        <input type="text" id="cle" name="cle" required>
        <button type="submit" name="submit">Se connecter</button>
    </form>
    <div id="asteroid1" style="width: 400px; height: 400px; overflow: hidden;">
        <img src="../images/asteroid_1.png" alt="Description de l'image" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div id="asteroid2" style="width: 350px; height: 350px; overflow: hidden;">
        <img src="../images/asteroid_2.png" alt="Description de l'image" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div id="asteroid3" style="width: 300px; height: 300px; overflow: hidden;">
        <img src="../images/asteroid_3.png" alt="Description de l'image" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
</body>
</html>
