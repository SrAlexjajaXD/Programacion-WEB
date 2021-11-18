var http = require("http");
function iniciar() {
 function onRequest(request, response) {
 console.log("Petición Recibida.");
 response.writeHead(200, {"Content-Type": "text/html"});
 response.write("<h1>Hola Mundo Ejemplo00</h1>");
 response.end();
 }
 http.createServer(onRequest).listen(3000);
 console.log("Servidor Iniciado.");
}
iniciar();