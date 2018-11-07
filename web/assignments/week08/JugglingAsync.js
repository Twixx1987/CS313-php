const bl = require('bl');
const http = require('http');

let results = [];
let count = 0;

for (let i = 0; i < 3; i++) {
    let request = getAll(i);
}

function getAll(index) {
    let request = http.get(process.argv[index + 2], function (response) {
        let allData = new bl();
        response.setEncoding('utf8');
        response.pipe(bl(function (error, data) {
            if (error)
                console.log(error);
            else
                allData.append(data);
        }));
        response.on('end', function (error, result) {
            results[index] = allData.toString();
            count++;

            if (count === 3) {
                printresults();
            }
        });
    });
    request.on('error', console.error);
}


function printresults() {
    for (let j = 0; j < 3; j++) {
        console.log(results[j]);
    }
}