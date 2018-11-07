const fs = require('fs');
const path = require('path');

module.exports = function(dir, ext, cb) {
    fs.readdir(dir, (err, list) => {
        if (err) {
            return cb(err);
        }
        let extension = '.' + ext;
        const filtered = [];
        list.forEach(file => {
            if (path.extname(file) === extension) {
                filtered.push(file);
            }
        });

        cb(null, filtered);
    });
};