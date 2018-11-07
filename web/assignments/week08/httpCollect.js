const bl = require('bl');
const http = require('http');

let request = http.get(process.argv[2], collectData);

request.on('error', console.error);

function collectData(response) {
    let allData = new bl();
    response.setEncoding('utf8');
    response.pipe(bl(function (error, data) {
        if (error)
            console.log(error);
        else
            allData.append(data);
    }));
    response.on('end', function (error, result) {
        console.log(allData.length);
        console.log(allData.toString());
    });
}