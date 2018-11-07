const fs = require('fs');
let buf = fs.readFile(process.argv[2], fileLength);

function fileLength(error, data) {
	if(error) {
		console.log(error);
	} else {
	    const lines = data.toString().split('\n').length - 1;
	    console.log(lines);
	}
}