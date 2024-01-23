const express = require('express');
const app = express();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const mysql = require('mysql');

app.get("/", function(req, res){
    res.sendFile(__dirname + '/test.html');
})

io.on('connection', () => {
    console.log('a user is connected');
    socket.on('disconnect', function (){
        console.log('a user is disconnected');
    })
})

http.listen(3000, function(){
    console.log('server sur le port : 3000'  );
})