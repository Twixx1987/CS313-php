const fs = require('fs');
let buf = fs.readFileSync(process.argv[2]);
const str = buf.toString();
console.log(str.split('\n').length - 1);