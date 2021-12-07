/* ⚡⚡ FUNCIONES ⚡⚡ */
/*
let a = 10;
console.log(a);
let b = a;
console.log(b)
a = 11;
console.log(a, b);

var c;
console.log(c)
*/
// saludar();

function saludar(){
    console.log('Hola queridos amigos');
}

saludar();

let fechaNacimiento = 2000;

// ⚡⚡ PARAMETROS & ARGUMENTOS

// 💡💡 PARAMETRO
function obtenerEdad(fechaN){
    const edad = 2021 - fechaN;
    console.log(edad);
}

// 💡💡 ARGUMENTO
obtenerEdad(fechaNacimiento);


let edad1 = 31;

function obtenerEdad2(fechaN){
    // 💡💡 LAS FUNCIONES MANEJAN SU PROPIO SCOPE -> AMBITO O CONTEXTO
    // let edad2 = 45;
    edad1 = 45;
    console.log(edad1);
}

obtenerEdad2();
console.log(edad1);
// console.log(edad2);

function sumar (a, b){
    let resultado = a + b;
    // console.log(resultado);
    return `El resultado es ${resultado}`;
}

console.log(sumar(4, 9)); // -> 13

const suma = sumar(2,2);
console.log(suma)

function operar(a,b){
    let resultado1 = a + b;
    let resultado2 = a - b;
    let resultado3 = a * b;
    // return [resultado1, resultado2, resultado3];
    // document.querySelector('.ciudades').innerHTML = `${resultado1} ${resultado2} ${resultado3}`;
    return `EL resultado de sumar ${a} y ${b} es ${resultado1}`;
}
const resArray = operar(2,3);
console.log(resArray);
