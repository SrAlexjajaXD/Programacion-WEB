let personas=[{
                "nombre":"Pinocho",
                "procedencia":"Italia",
              },
              {
                "nombre":"Goku",
                "procedencia":"Japon",
              },
              {
                "nombre":"Superman",
                "procedencia":"Kripton",
              },
              {
                "nombre":"Thor",
                "procedencia":"Asgard",
              }];

//document.write(JSON.stringify(personas));
for (obj of personas)
    document.write(JSON.stringify(obj)+"<br>");
for (obj of personas)
    document.write(JSON.stringify(obj.nombre)+"<br>");
for (obj of personas)
    document.write(JSON.stringify(obj.procedencia)+"<br>");

/*
Usano un for each aplicado al arreglo personas despliegue los objetos mostrando
por cada objeto el mensaje siguiente:
 "El personaje ["nombre"] es de ["lugar"]"

 nota: procure utilizar una funcion para constriuir el string de salida 
 para cada objeto
 */

 let mensaje=(objeto)=>(document.write(
     "El personaje "+objeto.nombre+" es de "+objeto.procedencia+"<br>"));

personas.forEach(element => mensaje(element));

