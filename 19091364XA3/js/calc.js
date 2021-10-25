let resultado=document.getElementById("resultado");
let valor1=document.getElementById("valor1");
let valor2=document.getElementById("valor2");
let suma=document.getElementById("sumar");
let resta=document.getElementById("restar");
let multiplica=document.getElementById("multiplicar");
let divide=document.getElementById("dividir");
let modulo=document.getElementById("modulo");
let raiz=document.getElementById("raiz");
let potencia=document.getElementById("potencia");
let limpia=document.getElementById("limpiar");

suma.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s = v1 + v2;
    resultado.textContent = s.toPrecision(5);
});
resta.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s = v1 - v2;
    resultado.textContent = s.toFixed(5);
});
multiplica.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s = v1 * v2;
    resultado.textContent = s.toFixed(5);
});
divide.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s = v1 / v2;
    resultado.textContent = s.toFixed(5);
});
modulo.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s = v1 % v2;
    resultado.textContent = s.toFixed(5);
});
raiz.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s1 = Math.sqrt(v1);
    let s2 = Math.sqrt(v2);
    resultado.textContent = s1.toFixed(5)+" y "+s2.toFixed(5);
});
potencia.addEventListener("click", () => {
    let v1 = parseFloat(valor1.value);
    let v2 = parseFloat(valor2.value);
    let s = v1 ** v2;
    resultado.textContent = s.toFixed(5);
});
limpia.addEventListener("click", () => {
    valor1.value = "";
    valor2.value = "";
    resultado.textContent="Aqui veras el resultado";
});