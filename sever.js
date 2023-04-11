const server = require('http').createServer();
const io = require('socket.io')(server);
const mysql = require('mysql');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'zxcvBnm123',
  database: 'university'
});

io.on('connection', function(socket) {
  console.log('A user connected');

  socket.on('vote', function(data) {
    let ideaID = data.ideaID;
    let voteType = data.voteType;

    // Update the database accordingly
    const query = `INSERT INTO thumbs (Vote, UserID, IdeaID) VALUES (${voteType}, ${socket.userID}, ${ideaID}) ON DUPLICATE KEY UPDATE Vote = ${voteType}`;
    connection.query(query, function (error, results, fields) {
      if (error) throw error;
      console.log('Vote updated in database');
    });

    // Emit a 'voteUpdate' event to all connected clients
    io.emit('voteUpdate', { ideaID: ideaID, voteType: voteType });
  });

  socket.on('disconnect', function() {
    console.log('A user disconnected');
  });
});

server.listen(3000, () => {
  console.log('Socket server listening on port 3000');
});
