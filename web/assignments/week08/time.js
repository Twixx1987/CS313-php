const net = require('net');

const server = net.createServer((socket) => {
    // 'connection' listener
    console.log('client connected');
    socket.on('end', () => {
        console.log('client disconnected');
    });
    let year = month = day = hour = minute = 0;
    let dateString = "";
    let date = new Date();

    year = date.getFullYear();
    month = zeroFill(date.getMonth() + 1, '-');
    day = zeroFill(date.getDate(), '-');
    hour = zeroFill(date.getHours(), ' ');
    minute = zeroFill(date.getMinutes(), ':');

    dateString = year + month + day + hour + minute;

    socket.end(dateString + '\n');
});

server.on('error', (err) => {
    throw err;
});

server.listen(Number(process.argv[2]), () => {
    console.log('server bound');
});

function zeroFill(datePart, character) {
    return (datePart < 10 ? character + '0' : character) + datePart;
}