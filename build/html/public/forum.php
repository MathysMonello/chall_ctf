<?php
session_start();
$cookie_name = "auth_user";
$cookie_value = "pasAdmin";

$cookie_options = [
    'expires' => time() + (86400 * 30), 
    'path' => '/', 
    'domain' => '', 
    'secure' => false, 
    'httponly' => false, 
    'samesite' => 'Strict', 
];


$_SESSION['sections'] = [
    [
        'nom' => 'Évènements intergalactiques',
        'description' => 'Discussions entre admins - ACCES RESTREINT ADMIN',
        'page' => 'evenement_galactique.php',
    ],
    [
        'nom' => 'Présentation des membres',
        'description' => 'Présentez vous dans cette section',
        'page' => 'pres_member.php',
    ],
    [
        'nom' => 'Voie Lactée',
        'description' => 'Discussions entre habitant de la Voie Lactée - ACCES RESTREINT MODO',
        'page' => 'voie_lactee.php',
        'password' => 'L3s4bEiLLesM0ntO15e'
    ],
    [
        'nom' => 'Aurores boréales',
        'description' => 'Discussions et photos sur les aurores boréales',
        'page' => 'aurores_boreales.php'
    ],
    [
        'nom' => 'Andromède',
        'description' => 'Discussions sur la galaxie d\'Andromède',
        'page' => 'andromede.php'
    ]
];

function printSections($section) {
    $dataUrl = !empty($section['password']) ? '' : htmlspecialchars($section['page']);
    echo '<section class="clickable-section" data-url="' . $dataUrl . '">';
    echo '<h2>' . htmlspecialchars($section['nom']) . '</h2>';
    echo '<p>' . htmlspecialchars($section['description']) . '</p>';

    if (!empty($section['password'])) {
        echo '<form method="POST" action="">';
        echo '<input type="hidden" name="section_name" value="' . htmlspecialchars($section['nom']) . '">';
        echo '<input type="password" name="section_password" placeholder="Mot de passe" required>';
        echo '<button type="submit">Accéder</button>';
        echo '</form>';
    }
    echo '</section>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['section_name'], $_POST['section_password'])) {
    foreach ($_SESSION['sections'] as $section) {
        if ($section['nom'] === $_POST['section_name']) {
            if (!empty($section['password']) && $section['password'] === $_POST['section_password']) {
                header('Location: ' . $section['page']);
                exit();
            } else {
                $error = "Mot de passe incorrect pour la section \"" . htmlspecialchars($section['nom']) . "\".";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forum.css">
    <title>Forum</title>
</head>
<body>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div class="star"></div>
    <div id="glass"></div>
    <main>
    <h1>Bienvenue sur le Forum</h1>
    <p>
    Nous sommes une communauté de passionnés qui parlons de différents sujets autour de l'univers et plus particulièrement de tout ce qui touche à l'espace. N'hésitez pas à visiter les différentes sections afin de découvrir celle qui vous convient le mieux. Chaque section correspond à un thème spécifique. Nous vous demandons donc de ne pas faire de hors-sujet sur ces topics. Nous laissons désormais votre curiosité vous emporter vers les différents sujets qui composent notre magnifique forum. Amusez-vous bien.
    </p>
    <!-- TODO: changer mot de passe /private/passwd-->
    <ul>
        <?php
        if (isset($_SESSION['auth'])){        
            foreach ($_SESSION['sections'] as $section):
                printSections($section);
            endforeach; 
        }
        else{
            echo "<a id=\"logout\" href=\"index.php\">Vous n'avez pas réussi à atteindre le score minimum requis.</a>";
        exit();
        }
        ?>

    <a id="logout" href="logout.php">Se déconnecter</a>
    </main>

    <script>
        document.querySelectorAll('.clickable-section').forEach(section => {
            section.addEventListener('click', function () {
                const url = this.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>
</body>
</html>
