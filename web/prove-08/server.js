const http = require('http');
const url = require('url');


function onRequest(req, res) {
    const q = url.parse(req.url, true).pathname;
    const qObject = url.parse(req.url, true).query;

    console.log("Received a Request for: " + req.url);

    switch (q) {
        case '/home':
            res.writeHead(200, { 'Content-Type': 'text/html' });
            res.write('<h1>Welcome to the Home Page</h1>');
            break;

        case '/getData':
            res.writeHead(200, { 'Content-Type': 'application/json' });
            var student = {
                "name": "Maretta Wight",
                "class": "CSE341"
            };
            var json = JSON.stringify(student);
            res.write(json);
            break;

        case '/addNumbers':
            var a = qObject.first;
            var b = qObject.second;
            var sum = a + b;
            res.writeHead(200, { 'Content-Type': 'application/json' });
            console.log(qObject);
            console.log(sum);



            break;

        default:
            res.writeHead(404, { 'Content-Type': 'text/html' });
            res.write("Page Not Found");

    }
    res.end();
}

var server = http.createServer(onRequest);
server.listen(8888);

console.log("Currently listening on 8888")