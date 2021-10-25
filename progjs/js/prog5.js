//ARRAYS ASOCIATIVO-OBJETO
/*let celular={
    nombre:"Samsung A7",
    procesador:"SnapDragon330",
    costo:7000,
    ram:"6gb",
    rom:"64gb"
}*/
//document.write(`${celular["procesador"]}`);
//document.write(celular.rom);
/*celular.costo=4500;
document.write(celular.costo+"<br>");
celular["ram"]="8gb";
document.write(celular.ram);*/

/*function saludo (){
    document.write("Hola, buenos dias<br>");
}
saludo();
saludo();
saludo();
saludo();*/

/*function saludo(nombre){
    document.write("Hola a todos, los saluda "+nombre+"<br>");
}
saludo("Fernando Lozano");
saludo("Alex Lozano");
saludo("Jose Luis");*/

/*function suma(num1, num2){
    let suma=num1+num2;
    return suma;
}

let resultado=suma(4,4);
document.write("El resultado de la suma es "+resultado);*/

/*para tarea:
Pensar en como diseñar dos funciones que reciban
como entrada un arrglo de datos. La primer funcion debera calcular el
promedio de los datos, la segunda debera calcular el valor maximo de 
esos datos.

promedio(arrglo)
maximo(arreglo)
*/
document.write("Hola<br>");
let arreglo=[55,20,22,53];

function promedio(arreglo){
    let suma = 0;
    for (let pos = 0; pos < arreglo.length; pos++)
        suma += arreglo[pos];
    let prom = suma / arreglo.length;
    return prom;
}

document.write("El promedio es: "+promedio(arreglo)+"<br>");


function maximo(arreglo){
    let i;
    let max=0;
    for(i=0;i<arreglo.length;i++){
        if(max<arreglo[i])
        max=arreglo[i];
    }
    return max;
}
document.write("El valor maximo es: "+maximo(arreglo));