const mymodule = require('./module');

mymodule(process.argv[2], process.argv[3], displayFiles);

function displayFiles(error, files) {
    if (error) {
        console.log(error);
    }

    files.forEach(file => {
        console.log(file);
    });
}