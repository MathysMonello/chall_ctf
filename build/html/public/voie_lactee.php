<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $user = $_POST['user'] ?? '';
    $message = $_POST['message'] ?? '';

    // Préparer les données pour l'API
    $postData = [
        'user' => $user,
        'message' => $message
    ];

    // Initialiser une requête cURL pour envoyer les données en POST
    $ch = curl_init('http://localhost:3000/messages'); // Remplacer par l'URL de votre API
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    }

    // Vérifier la réponse de l'API
    if ($response) {
        echo '<p style="color: green;">Message envoyé avec succès !</p>';
    } else {
        echo '<p style="color: red;">Erreur lors de l envoi du message.</p>';
    }
}

// Récupérer les messages existants comme avant
$api_url = 'http://localhost:3000/messages';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

if ($response) {
    $data = json_decode($response, true);
} else {
    echo "Erreur de récupération des données.";
    $data = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .post {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .post h2 {
            color: #2c3e50;
        }
        .post p {
            font-size: 16px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        form input, form textarea, form button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>

    <h1>Bienvenue sur le Blog</h1>
    <p>Envoyez un nouveau message :</p>

    <form method="POST">
        <input type="text" name="user" placeholder="Votre nom" required>
        <textarea name="message" placeholder="Votre message" rows="4" required></textarea>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Voici les derniers articles récupérés depuis l'API :</h2>

    <?php
    foreach ($data as $post) {
        echo '<div class="post">';
        echo '<h2>' . $post['user'] . '</h2>';
        echo '<p>' . $post['message'] . '</p>';
        echo '</div>';
    }
    ?>

</body>
</html>
