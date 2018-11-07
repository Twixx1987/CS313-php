const fs = require('fs');
const path = require('path');

let dir = fs.readdir(process.argv[2], fileNames);
let extension = '.' + process.argv[3];

function fileNames(error, files) {
	if(error) {
		console.log(error);
	} else {
	    files.forEach(file => {
	        if (path.extname(file) === extension) {
	            console.log(file);
	        }
	    });
	}
}