<?php
    session_start();

    $posts = [
    ['auteur' => 'McAuliffe', 'commentaire' => 'Bienvenue à tous les passionnés d\'astéroïdes ! 🌌 Nous sommes ravis de vous accueillir sur notre forum dédié à l\'univers fascinant des astéroïdes. Que vous soyez un expert en astronomie ou simplement curieux de découvrir ces objets célestes mystérieux, vous êtes au bon endroit ! Ici, vous pourrez échanger, partager vos découvertes, poser vos questions et discuter de tout ce qui touche aux astéroïdes : leurs origines, leur impact sur notre planète, les missions spatiales qui les explorent, et bien plus encore. N\'hésitez pas à vous présenter dans la section \"Présentation des membres\" et à explorer les différentes catégories du forum pour commencer à participer. Rappelez-vous que le respect et la bienveillance sont essentiels pour créer une atmosphère agréable et enrichissante pour tous. Nous espérons que vous trouverez ici une communauté chaleureuse et passionnée, prête à partager ses connaissances et ses découvertes ! 🌠 Bonne exploration et à très vite dans les discussions ! ✨'],
    ['auteur' => 'CenthorZZz', 'commentaire' => 'Bonjour à tous ! Juste un petit rappel amical de la part de l\'équipe de modération : notre objectif est de maintenir un espace convivial et respectueux pour tous les membres du forum. Nous vous encourageons à participer activement, mais également à respecter quelques règles simples pour garantir une expérience agréable pour chacun : Respect et bienveillance : Soyons tous respectueux les uns envers les autres, quelle que soit l\’opinion ou le niveau de connaissance. Chacun est ici pour apprendre et partager sa passion. Pas de contenu inapproprié : Veuillez éviter tout message ou comportement offensant, discriminatoire ou hors sujet. Les discussions doivent rester liées aux astéroïdes et à l’astronomie. Utilisez les bonnes sections : Merci de poster vos messages dans les catégories appropriées pour que tout le monde puisse facilement suivre les discussions.Si vous avez des questions ou des préoccupations, n\'hésitez pas à me contacter par message privé. Et si vous constatez un problème ou une infraction, merci de nous signaler le message ou l’utilisateur concerné.'],
    ['auteur' => 'Starkmane', 'commentaire' => 'Salut à tous ! 🚀 Je me joins à l’équipe pour vous souhaiter une excellente aventure parmi nous ! En tant que membre de l’administration, je suis là pour veiller à ce que tout se passe bien et que vous vous sentiez à l\’aise dans notre communauté. L\’univers des astéroïdes est fascinant, et c’est un plaisir de voir tant de passionnés se rassembler pour en discuter. Si vous avez des suggestions ou des idées pour améliorer le forum, n\’hésitez pas à me les partager. Nous sommes toujours ouverts à de nouvelles propositions pour enrichir cette belle aventure collective ! Merci de contribuer à faire de ce forum un espace où chacun peut échanger, découvrir et se divertir. Et surtout, amusez-vous bien dans vos explorations stellaires ! À très vite sous les étoiles ! ✨'],
    ['auteur' => 'Martiendu62', 'commentaire' => 'Hello tout le monde ! 🌠 Juste un petit mot pour vous rappeler que nous sommes là pour vous aider à naviguer au mieux sur le forum. Si vous avez des questions ou si vous avez besoin d’aide pour quelque chose, n’hésitez surtout pas à me contacter, je serai ravi de vous guider ! Pensez à utiliser les boutons "Signaler" en cas de problème, et rappelez-vous que tout le monde ici est là pour partager sa passion dans la bonne humeur. Si vous avez des suggestions pour améliorer l’organisation du forum ou des idées pour de nouvelles discussions, je suis tout ouïe ! Merci à tous pour votre participation active, et surtout, restez curieux et respectueux dans vos échanges. Ensemble, faisons de cet espace un lieu d’apprentissage et de convivialité ! À bientôt sous la voie lactée ! 🌌'],
    ['auteur' => 'MangeurDEtoile', 'commentaire' => 'Salut à tous ! Je suis MangeurDEtoile, un passionné d\'astronomie depuis mon enfance. J\'ai toujours été fasciné par les astéroïdes, leur trajectoire et l\'impact qu\'ils peuvent avoir sur notre planète. J\'adore lire des articles scientifiques et regarder des documentaires sur l\'espace. Mon rêve, un jour, serait de participer à une mission spatiale pour étudier de près ces mystérieuses roches célestes. Hâte de discuter avec vous et d\'échanger nos découvertes sur les astéroïdes ! 🌟'],
    ['auteur' => 'Cosmon0te', 'commentaire' => 'Salut tout le monde ! Je m\'appelle Cosmon0te, et je suis un explorateur de l\'univers dans l\'âme. Même si je n\'ai pas encore pu voyager dans l\'espace (mais qui sait, un jour !), l\'astronomie est une de mes grandes passions. Je suis ici pour en apprendre toujours plus sur les astéroïdes, leur origine et leur évolution. J\'aime également regarder les missions spatiales en direct, et je me tiens toujours à jour sur les dernières découvertes.\nRavi de rejoindre cette belle communauté et d\'échanger avec vous sur ce sujet fascinant ! 🚀'],
    ['auteur' => 'Ari4ne', 'commentaire' => 'Bonjour à tous ! Je suis Ari4ne, une passionnée d’astronomie et plus particulièrement des astéroïdes. J\’aime les observer à travers des télescopes et suivre les actualités scientifiques. J\'ai aussi un faible pour les théories qui entourent les impacts d\'astéroïdes et leur rôle dans l\’évolution de la Terre. J\'ai hâte de partager mes découvertes et d’en apprendre encore plus grâce à vous tous ! À très bientôt sur le forum ! ✨' ],
    ['auteur' => 'KatFlame', 'commentaire' => 'Salut ! Je suis KatFlame, une grande amatrice d\'astronomie et de tout ce qui touche à l\'espace. J\'ai commencé à m\'intéresser aux astéroïdes après avoir vu un film sur une mission pour en détruire un avant qu\'il ne frappe la Terre. Depuis, je suis accroc à tout ce qui concerne ces corps célestes. Je suis impatiente de discuter de leurs caractéristiques, de leurs impacts potentiels et des recherches menées pour les suivre. Vivement les échanges avec vous tous ! 🌌']

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
	<link href="pres_membre.css" rel="stylesheet" />
</head>
<body>
    <h1>Bienvenue dans la section présentation des membres</h1>

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
