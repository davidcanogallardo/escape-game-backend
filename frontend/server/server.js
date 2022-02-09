<<<<<<< HEAD
const httpServer = require("http").createServer();
const ComunicacionServidor = require('./ComunicacionServidor.js');
const io = require("socket.io")(httpServer, {  
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});
io.use((socket, next) => {
  next();
});

let serverCom = new ComunicacionServidor(io);
serverCom.listenConnection();

=======
const httpServer = require("http").createServer();
const ComunicacionServidor = require('./ComunicacionServidor.js');
const io = require("socket.io")(httpServer, {  
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});
io.use((socket, next) => {
  next();
});

let serverCom = new ComunicacionServidor(io);
serverCom.listenConnection();

>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
httpServer.listen(3000);