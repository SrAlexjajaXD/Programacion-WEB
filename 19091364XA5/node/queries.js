/* En este ejemplo se trabaja con una base de datos como la siguiente:

Usuario: mario
Password: 123
Base de datos: basedatos
Tabla: autos
Nombres de los campos:

 id  |   tipo    |   marca   
-----+-----------+-----------
 100 | CR-V      | Honda
 200 | March     | Nissan
 300 | Spark     | Chevrolet
 400 | Ka        | Ford
 667 | Fits      | Honda

Descripción de los campos de la tabla autos:

 Column |       Type        | Collation | Nullable | Default 
--------+-------------------+-----------+----------+---------
 id     | integer           |           | not null | 
 tipo   | character varying |           |          | 
 marca  | character varying |           |          | 
Indexes:
    "autos_pkey" PRIMARY KEY, btree (id)

*/

const Pool = require('pg').Pool //instalar libreria de pg, para manejar postgresql
const pool = new Pool({
  user: 'sharky',
  host: 'localhost',
  database: 'newbase',
  password: 'lkpoaszxm2001',
  port: 5432,
})

const getAlbumes = (request, response) => {
  pool.query('SELECT * FROM albumes ORDER BY id ASC', (error, results) => {
    if (error) {
      throw error
    }
    response.status(200).json(results.rows)
    console.log("Consulta general:\n");
    console.log(results.rows);
    console.log("\n");
  })
}

const getAlbumesById = (request, response) => {
  const id = parseInt(request.params.id) // Si el id es entero
  //const id = request.params.id; // si el id es string
  pool.query('SELECT * FROM albumes WHERE id = $1', [id], (error, results) => {
    if (error) {
      throw error
    }
    response.status(200).json(results.rows)
    console.log(`Consulta individual id=${id}:\n ${JSON.stringify(results.rows)}\n`);
  })
}

const createAlbum = (request, response) => {
  const { id, artista, nombre, ano, descripcion, link, imagen } = request.body

  pool.query('INSERT INTO albumes VALUES ($1, $2, $3, $4, $5, $6, $7) RETURNING id', [id, artista, nombre, ano, descripcion, link, imagen], (error, results) => {
    if (error) {
      console.log("Ha ocurrido un error:\n"+error.message);
    }
    response.status(201).send(`Album agregado:\nid=${id},artista=${artista},nombre=${nombre}`);
    console.log(`Album agregado => id=${id},artista=${artista},nombre=${nombre}\n`);
  })
}

const updateAlbum = (request, response) => {
  const id = parseInt(request.params.id)
  const { artista, nombre, ano, descripcion, link, imagen } = request.body

  pool.query(
    'UPDATE albumes SET artista= $1, nombre = $2, ano = $3, descripcion = $4, link = $5, imagen = $6 WHERE id = $7',
    [artista, nombre, ano, descripcion, link, imagen, id],
    (error, results) => {
      if (error) {
        throw error
      }
      response.status(200).send(`Album modificado con ID: ${id}\n`)
    }
  )
}

const deleteAlbum = (request, response) => {
  const id = parseInt(request.params.id)

  pool.query('DELETE FROM albumes WHERE id = $1', [id], (error, results) => {
    if (error) {
      throw error
    }
    response.status(200).send(`Album eliminado con ID: ${id}\n`)
  })
}

module.exports = {
  getAlbumes,
  getAlbumesById,
  createAlbum,
  updateAlbum,
  deleteAlbum
}
