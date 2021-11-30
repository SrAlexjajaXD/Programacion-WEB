//Ejemplo promesas
let resultado = 1;
let a=[0.5,0.2,0.3,1,2,3];

let miPromesa=new Promise((resolve,reject)=>{
    document.write("Estoy haciendo algo<br>");
    if(resultado==1)
        resolve(a);
    else
        reject("No se cumplio la promesa");
});

// miPromesa.then("Hacer cuando la promesa se cumple")//si la promesa se cumple
// .then("Se ejecuta y se cumple lo primero")
// .then("Se ejecuta si se cumple lo segundo")
// .then("Se ejeccuta si se cumple lo tercero")
// .catch("Hacer cuando la promesa no se cumple");//si no se cummple la promesa

miPromesa.then(algo=>algo.map(dato=>2*dato))
.then(x=>document.write(x))
.catch(mensaje=>document.write(mensaje+"<br>"));