const express = require('express');
const { createServer } = require('http');
const { Server } = require('socket.io');
const cors = require('cors');

const app = express();
const server = createServer(app);
const io = new Server(server, {
  cors: {
    origin: 'http://127.0.0.1:5500',
    methods: ['GET', 'POST'],
  },
});

const PORT = process.env.PORT || 3000;

app.use(cors());


// Liste des lobbies
const lobbies = {};

// Votre code Socket.io ici
io.on('connection', (socket) => {
  console.log('A user connected');

  socket.on('create-lobby', ({ type, maxPlayers }) => {
    // Génération d'un ID unique pour le lobby
    const lobbyId = generateUniqueLobbyId();

    // Création du lobby
    lobbies[lobbyId] = {
      type,
      maxPlayers,
      players: [],
    };

    // Rejoindre le lobby
    socket.join(lobbyId);

    // Informer l'utilisateur du succès
    socket.emit('lobby-created', { lobbyId });
  });

  // ... Gestion d'autres événements ...
});

function generateLobbyLink(lobbyId) {
  const baseUrl = 'http://127.0.0.1:5500';
  return `${baseUrl}/lobby.html?lobbyId=${lobbyId}`;
}

function generateUniqueLobbyId() {
  return uuidv4();
}

// ... Autres configurations ...

server.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
