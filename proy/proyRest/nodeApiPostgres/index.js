// Crear una carpeta para proyecto que en este ejemplo es node-api-postgres y copiar
// ahí los arhivos index.js y queries.js (cambiarse a esa carpeta)
// Asegurarse de instalar express y pg
// npm i express pg




const express = require('express')
const bodyParser = require('body-parser')
const app = express()
const db = require('./queries')
const port = 3008

app.use(bodyParser.json())
app.use(
  bodyParser.urlencoded({
    extended: true,
  })
)


// Configurar cabeceras y cors
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Headers', 'Authorization, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Request-Method');
    res.header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
    res.header('Allow', 'GET, POST, OPTIONS, PUT, DELETE');
    next();
});


app.get('/', (request, response) => {
  response.json({ info: 'Node.js, Express, y Postgres API' })
})

app.get('/autos', db.getAutos)
app.get('/autos/:id', db.getAutoById)
app.post('/autos', db.createAuto)
app.put('/autos/:id', db.updateAuto)
app.delete('/autos/:id', db.deleteAuto)

app.listen(port, () => {
  console.log(`App corriendo en el puerto ${port}.`)
})
