// require the http module
let http = require("http");

// create a server object
let server = http.createServer(createPage);
server.listen(5000);

// callback function to display hello world
function createPage(request, response) {
    // get the request path
    let path = request.url;

    // check the path to see what page should be displayed
    if (path === "/home") {
        response.writeHead(200, { 'Content-Type': 'text/html' });
        response.write('<h1>Welcome to the Home Page!</h1>');
        response.write('<p>It\'s a crazy Node world!</p>');
        response.end();
    } else if (path === '/getData') {
        response.writeHead(200, { 'Content-Type': 'application/json' });
        response.write('{ "name" : "Shaun Densley", "class" : "CS313" }');
        response.end();
    } else if (path === '/math') {
        response.writeHead(200, { 'Content-Type': 'text/html' });
        response.write('<script>// the code to calculate the two operand math equation\n' +
        'function calculate() {\n' +
        '    // get the operands and operator\n' +
        '    let lh = Number(document.getElementById("lh").value);\n' +
        '    let operator = document.getElementById("operator").value;\n' +
        '    let rh = Number(document.getElementById("rh").value);\n' +
        '    // initialize the result\n' +
        '    let result = null;\n' +
        '    // calculate based on the operand selected\n' +
        '    if (operator === "add") {\n' +
        '        result = lh + rh;\n' +
        '    } else if (operator === "subtract") {\n' +
        '        result = lh - rh;\n' +
        '    } else if (operator === "multiply") {\n' +
        '        result = lh * rh;\n' +
        '    } else if (operator === "divide") {\n' +
        '        result = lh / rh;\n' +
        '    } else if (operator === "modulo") {\n' +
        '        result = lh % rh;\n' +
        '    } else {\n' +
        '        result = "There was some unknown error!";\n' +
        '    }\n' +
        '    // display the result\n' +
        '    document.getElementById("result").innerHTML = result;\n' +
        '}</script>');
        response.write('<h1>Welcome to the Math Page!</h1>');
        response.write('<p>Enter some numbers and select an operator');
        response.write(' the click calculate to see what the result is.</p>');
        response.write('<input type="number" id="lh" name="lh"/>');
        response.write('<select id="operator" name="operator">');
        response.write('<option value="add">+</option>');
        response.write('<option value="subtract">-</option>');
        response.write('<option value="multiply">*</option>');
        response.write('<option value="divide">/</option>');
        response.write('<option value="modulo">%</option></select>');
        response.write('<input type="number" id="rh" name="rh"/> = ');
        response.write('<span id="result"></span><br /><br />')
        response.write('<button id="calulate" name="calculate"');
        response.write(' onclick="calculate()">Calculate</button>');
        response.end();
    } else {
        response.writeHead(404, { 'Content-Type': 'text/html' });
        response.write('<h1>ERROR: 404 Page Not Found!</h1>');
        response.write('<p>The page you are trying to access is not found!</p>');
        response.end();
    }
}
