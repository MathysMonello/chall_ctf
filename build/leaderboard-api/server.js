const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors'); // Importez le middleware CORS

const app = express();
const PORT = 3000;

// Activer CORS pour toutes les requêtes
app.use(cors());

app.use(bodyParser.json());

// Middleware pour traiter les requêtes JSON
app.use(bodyParser.json());

// Stockage temporaire des scores en mémoire (dans un tableau)
let leaderboard = [{name:"DestructeurDeMonde", score:1000000},
                    {name:"BigPuissance", score:101203},
                    {name:"Xx_carla33_xX", score:92064},
                    {name:"SniperKing", score:100995},
];

// Route pour envoyer un score
app.post('/submit-score', (req, res) => {
    const { name, score, key } = req.body;

    // Vérifie que le score et le nom sont valides
    if (typeof score === 'number' && typeof name === 'string' && name.trim() !== '' && typeof key === 'number'){ 
        if (score<1000)
            return res.status(400).json({ error: 'ton score ne mérite pas le leaderBoard'});
        if(3 * score % 459 === key){
            leaderboard.push({ name, score });
            leaderboard.sort((a, b) => b.score - a.score);

            // Limite le leaderboard aux 10 meilleurs scores
            leaderboard = leaderboard.slice(0, 10);

            res.status(200).json({ message: 'Score ajouté avec succès! flag{CAMPEON DEL MUNDO}' });
            }
        else{
            res.status(400).json({ error: 'Mauvaise clé' });
        }
    } else {
        res.status(400).json({ error: 'Nom ou score invalide' });
    }
});

// Route pour envoyer un score
app.post('/forum/key', (req, res) => {
    const { password } = req.body;
    if (password === "kaizen"){
   	res.status(200).json({ message: 'clé valide'});
    } else {
        res.status(400).json({ error: 'clé invalide' });
    }
});



// Route pour récupérer le leaderboard
app.get('/leaderboard', (req, res) => {
    res.status(200).json(leaderboard);
});

// Démarre le serveur
app.listen(PORT, () => {
    console.log(`Serveur en cours d'exécution sur le port ${PORT}`);
});
