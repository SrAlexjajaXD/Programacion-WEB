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
  database: 'basedatos',
  password: 'lkpoaszxm2001',
  port: 5432,
})

const getAutos = (request, response) => {
  pool.query('SELECT * FROM autos ORDER BY id ASC', (error, results) => {
    if (error) {
      throw error
    }
    response.status(200).json(results.rows)
    console.log("Consulta general:\n");
    console.log(results.rows);
    console.log("\n");
  })
}

const getAutoById = (request, response) => {
  const id = parseInt(request.params.id) // Si el id es entero
  //const id = request.params.id; // si el id es string
  pool.query('SELECT * FROM autos WHERE id = $1', [id], (error, results) => {
    if (error) {
      throw error
    }
    response.status(200).json(results.rows)
    console.log(`Consulta individual id=${id}:\n ${JSON.stringify(results.rows)}\n`);
  })
}

const createAuto = (request, response) => {
  const { id, tipo, marca } = request.body

  pool.query('INSERT INTO autos (id, tipo, marca) VALUES ($1, $2, $3) RETURNING id', [id, tipo, marca], (error, results) => {
    if (error) {
      console.log("Ha ocurrido un error:\n"+error.message);
    }
    response.status(201).send(`Auto agregado:\nid=${id},tipo=${tipo},marca=$id{marca}`);
    console.log(`Auto agregado => id=${id},tipo=${tipo},marca=${marca}\n`);
  })
}

const updateAuto = (request, response) => {
  const id = parseInt(request.params.id)
  const { tipo, marca } = request.body

  pool.query(
    'UPDATE autos SET tipo= $1, marca = $2 WHERE id = $3',
    [tipo, marca, id],
    (error, results) => {
      if (error) {
        throw error
      }
      response.status(200).send(`Auto modificado con ID: ${id}\n`)
    }
  )
}

const deleteAuto = (request, response) => {
  const id = parseInt(request.params.id)

  pool.query('DELETE FROM autos WHERE id = $1', [id], (error, results) => {
    if (error) {
      throw error
    }
    response.status(200).send(`Auto eliminado con ID: ${id}\n`)
  })
}

module.exports = {
  getAutos,
  getAutoById,
  createAuto,
  updateAuto,
  deleteAuto
}
