//SENTENCIA IF
/*let a="lluvia";
let b="Lluvia";
if(a>b)
    document.write(`${a} es mayor que ${b}<br>`);
else if(a<b)
    document.write(`${a} es menor que ${b}<br>`);
else
    document.write(`${a} y ${b} son iguales<br>`);*/

//SENTENCIA SWITCH
//Supongamos que 0 significa "Gano local"
//Supongan que 1 significa "Empate"
//supongan que 2 significa "Gano visitantes"
//Supongan que 3 significa "Partido suspendido"
/*let codigo=null;
switch(codigo){
    case 0:document.write("Gano local");
    break;
    case 1:document.write("Empate");
    break;
    case 2:document.write("Gano visitantes");
    break;
    case 3:document.write("Partido suspendido");
    break;
    default:document.write("Codigo no reconocido");
}*/

//SENTENCIA WHILE
/*let a=1;
while(a<=5){
    document.write(`${a}<br>`);
    a++;
}*/

/*let b=1;
do{
    document.write(`${b}<br>`);
    b++;
}while(b<=5);*/

/*for(let i=5; i<=8; i+=0.25){
    document.write(`${i}<br>`);
}*/

/*let datos=[3.1416, false, `hola`, 400, `ok`];
for(let pos=0; pos<datos.length;pos++){
    document.write(`El valor en ${pos} es ${datos[pos]}<br>`)
}*/

let valores=[100,50];
let nDatos=valores.length;
let suma=0;
for(let pos=0; pos<nDatos;pos++)
    suma+=valores[pos];
let prom=suma/nDatos;
document.write(`El promedio de los datos es ${prom}`);
