const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const PORT = 3000;

let serverStatus = 'Offline';
let players = 0;

app.use(express.static('public'));
app.use(bodyParser.json());

app.get('/api/status', (req, res) => {
    res.json({
        status: serverStatus,
        players: players
    });
});

app.post('/api/toggleServer', (req, res) => {
    if (serverStatus === 'Offline') {
        serverStatus = 'Online';
        players = 10; // Beispiel für Spielerzahl
    } else {
        serverStatus = 'Offline';
        players = 0;
    }
    res.json({ status: serverStatus, players: players });
});

app.listen(PORT, () => {
    console.log(`Server läuft auf http://localhost:${PORT}`);
});
