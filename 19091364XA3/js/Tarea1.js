let arreglo1=[];
let x,y;
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

function recibirArreglo(arreglo) {
    let elemento=document.getElementById(arreglo);
    let numeros=elemento.value;
    arreglo1=numeros.split(',').map(Number);
  }

function recibirNumeros(numero1, numero2) {
   let elemento1=document.getElementById(numero1);
   x=elemento1.value;
   let elemento2=document.getElementById(numero2);
   y=elemento2.value;
}
function recibirObjeto(nom,proc){
  let nombr=document.getElementById(nom);
  let procede=document.getElementById(proc);
  let persona={"nombre":nombr.value,"procedencia":procede.value};
  personas.push(persona);
}

function mostrarResul(a,elemento) {
  let parrafo=document.createElement('p');
  parrafo.setAttribute("id", elemento);
  let texto = document.createTextNode("Resultado: " + a);
  parrafo.appendChild(texto);
  let pV=document.getElementById(elemento);
  let rem=pV.parentNode;
  rem.replaceChild(parrafo,pV);
}

function promedio(arreglo){
  recibirArreglo(arreglo)
  let suma=0;
  for(elem of arreglo1)
      suma+=elem;
  let prom=suma/arreglo1.length;
  return prom;
}

function maximo(arreglo){
  recibirArreglo(arreglo)
  let max=0;
  for(elem of arreglo1){
      if(max<elem)
      max=elem;
  }
  return max;
}

let mayor=(valor1,valor2)=>{
  recibirNumeros(valor1,valor2);
  let mayor;
  if(x>y)
  mayor= x;
  if(y>x)
  mayor= y;
  if(y==x)
  mayor="Ambos numeros son iguales";
  return mayor;
};



let mensaje=(objeto, elemento)=>{
  padre=document.getElementById(elemento);
  parrafo=document.createElement('p');
  let texto=document.createTextNode("El personaje "+objeto.nombre+" es de "+objeto.procedencia);
  parrafo.appendChild(texto);
  padre.appendChild(parrafo);
};

let mostrar=(nom,proc, elemento)=>{
  padre=document.getElementById(elemento);
  while(padre.hasChildNodes())
    padre.removeChild(padre.firstChild);

  recibirObjeto(nom,proc);
  
  personas.forEach(element => mensaje(element, elemento));
};




/*let mensaje1=(objeto)=>{
  let texto=document.createTextNode("El personaje "+objeto.nombre+" es de "+objeto.procedencia+"<br>")
  return texto
};

personas.forEach(element => mensaje1(element));*/