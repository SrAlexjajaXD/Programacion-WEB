/*TAREA 1:
Pensar en como diseñar dos funciones que reciban
como entrada un arrglo de datos. La primer funcion debera calcular el
promedio de los datos, la segunda debera calcular el valor maximo de 
esos datos.
promedio(arrglo)
maximo(arreglo)
*/
let arreglo1;
function obtenerArreglo(entrada){
    let elemento=document.getElementById(entrada);
    numeros=elemento.value;
    return arreglo1=(numeros.split(',').map(Number));
}



function promedio(arreglo){
    let suma = 0;
    for (let pos = 0; pos < arreglo.length; pos++)
        suma += arreglo[pos];
    let prom = suma / arreglo.length;
    return prom;
}
document.write("El promedio del arreglo es: "+promedio(arreglo1));


function maximo(arreglo1){
    let i;
    let max=0;
    for(i=0;i<arreglo1.length;i++){
        if(max<arreglo1[i])
        max=arreglo1[i];
    }
    return max;
}
document.write("El valor maximo es: "+maximo(arreglo1));





/*hacer los mismos ejercicios de calcular promedio y valor maximo, pero
hacerlo con for of*/
document.write("<h3>Tarea 2: Funciones FOR OF para obtener promedio y maximo de un arreglo</h3>");
function promedioForOf(arreglo){
    let suma=0;
    for(elem of arreglo)
        suma+=elem;
    return suma/arreglo.length;
}
document.write("El promedio obtenido con el ForOf es: "+promedioForOf(arreglo)+
"<br>");

function maximoForOf(arreglo){
    let max=0;
    for(elem of arreglo){
        if(max<elem)
        max=elem;
    }
    return max;
}
document.write("El maximo obtenido con el ForOf es: "+maximoForOf(arreglo)
+"<br>");




/*hacer una funcion felcha que se llame mayor que reciba dos argumentos de
entreada y retorne el mayor de los dos*/
document.write("<h3>Tarea 3: Funcion flecha para obtener el mayor de dos valores</h3>");
let mayor=(x,y)=>{
    if(x>y)
    return x;
    if(y>x)
    return y;
    if(y==x)
    return "Ambos son iguales";
};
document.write("El resultado de la funcion flecha al comparar "+
"10 y 6 da como resultado que el mayor es: "+mayor(10,6));





/*
Usano un for each aplicado al arreglo personas despliegue los objetos mostrando
por cada objeto el mensaje siguiente:
 "El personaje ["nombre"] es de ["lugar"]"

 nota: procure utilizar una funcion para constriuir el string de salida 
 para cada objeto
 */document.write("<br><h3>Tarea 4: Funcion for each para mostrar arreglo de personas</h3>")
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
 let mensaje=(objeto)=>{
     document.write("El personaje "+objeto.nombre+" es de "+objeto.procedencia+"<br>")
    };

personas.forEach(element => mensaje(element));