let animales=["leon", "tigre", "pantera", "jaguar", "jirafa", "elefante"];
function ver (x){
    document.write(x+"<br>");
}
ver(animales);

ver("<br>Salida de un for convencional");
for(let i=0; i<animales.length; i++){
    ver(animales[i]);
}

ver("<br>Salida con un for of");
for(elem of animales){
    ver(elem);
}

ver("<br>Salida con un for in");
for(elem in animales){
    ver(elem);
}

let auto={
    "codigo":"A100", 
    "tipo":"Corolla",
    "marca":"Toyota",
    "agencia":"Cuernavaca",
    "costo":"300000"
}
ver(JSON.stringify(auto));

ver("<br>Salida con un for in");
for(x in auto){
    ver(x);
}
ver("<br>Atributos de un objeto")
ver(auto["marca"]);
ver(auto.agencia);

ver("<br>Ver los elementos del objeto con of")
for(x in auto){
    ver(auto[x]);
}

ver("<br>Usando un foreach");
animales.forEach(element => ver(element));

function duplica(x){
    ver(2*x);
}
duplica(15);

let duplica2=function(x){
    ver(2*x);
}
duplica2(25);

let duplica3=x=>ver(2*x);
duplica3(50);

let saludo=()=>ver("Hola mundo");
saludo();

let saludo1=x=>ver("Hola "+x);
saludo1("Alex Lozano");

/*let suma=(x,y)=>ver(x + y);
suma(10,20);*/
let suma=(x,y)=>{return x+y};

let c=suma(8,4);
ver("El valor de C es: "+c);

/*hacer los mismos ejercicios de calcular promedio y valor maximo, pero
hacerlo con for of
hacer una funcion felcha que se llame mayor que reciba dos argumentos de
entreada y retorne el mayor de los dos*/

