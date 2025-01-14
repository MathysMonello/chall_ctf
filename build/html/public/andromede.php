<?php
    session_start();

    $posts = [
    ['auteur' => 'Martiendu62', 'commentaire' => 'Salut à tous, j\'ai eu une discussion intéressante avec des amis sur un sujet qui me passionne, et j\'aimerais avoir vos avis. On parlait de la disparition des galaxies, et c\'est un concept qui me semble assez flou. Est-ce qu\'une galaxie peut réellement "disparaître", ou est-ce qu\'elle se transforme en quelque chose d\'autre au fil du temps ?'],
    ['auteur' => 'CenthorZZz', 'commentaire' => 'Salut Martiendu62, je vois ce que tu veux dire. C’est vrai que le concept de disparition des galaxies est complexe. En fait, les galaxies ne "disparaissent" pas comme un objet qui disparaît subitement. Mais, au fil du temps, elles peuvent fusionner avec d’autres galaxies, et leurs caractéristiques individuelles se dissipent. Cela peut donner l’impression qu’une galaxie disparaît, mais c’est plus une transformation.'],
    ['auteur' => 'Starkmane', 'commentaire' => 'Salut, je suis d’accord avec toi, CenthorZZz. Une galaxie, dans son sens strict, ne disparaît pas. Mais en effet, quand deux galaxies fusionnent, leurs structures peuvent se mélanger. Par exemple, la matière d’une galaxie peut être intégrée dans une plus grande galaxie. C’est un processus assez long, mais ça pourrait en donner l’impression.'],
    ['auteur' => 'Martiendu62', 'commentaire' => 'Merci pour vos réponses ! C’est un peu ce que j’essayais d’expliquer à mes amis, mais ils semblaient insister sur le fait qu’une galaxie ne disparaît pas vraiment, comme si elle était juste absorbée dans un trou noir. C’est un peu plus nuancé, non ?'],
    ['auteur' => 'Starkmane', 'commentaire' => 'Je comprends mieux maintenant ce que tes amis pensent, Martiendu62. En fait, la matière d\'une galaxie n\'est pas détruite ou effacée, elle est juste redistribuée au sein de l\'univers. Lorsqu’une galaxie se rapproche d’un trou noir supermassif au centre d’une autre galaxie, elle peut être "absorbée", mais même dans ce cas, la matière ne disparaît pas, elle change de forme.']
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title> 
    <style>       
      ul{
        list-style-type: none;
      }
    </style>
	<link href="andromede.css" rel="stylesheet" />
</head>
<body>
    <h1>Bienvenue dans la section Andromède</h1>

    <p id="sous-titre" >Messages publiés</p>

    <ul>
        <?php
        foreach ($posts as $p):
            echo '<li>';
            echo '<p><strong>'.$p['auteur'].'</strong></p>';
            echo '<p class="commentaire" >'.$p['commentaire'].'</p>';
            echo '</li>'; // ajouter date en haut à droite.
        endforeach; 
        ?>
    </ul>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
