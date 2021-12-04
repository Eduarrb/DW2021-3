// console.log('funcionaaaaaaaaaaaa');

/* ⚡⚡ STRINGS ⚡⚡ */
// SON UN TIPO DE OBJETO


//  var nombre = 'Juan'; 
// 12 === 12
// 🔥🔥 VARIABLES GLOBALES
// LC -> string persona = 'Jaimito'
//  DOM -> DOCUMENT OBJECT MODEL

let nombre = 'John';
let apellido = 'Smith';

// nombre.toUpperCase() -> objeto . metodo(funcioones)
// console.log(nombre.toUpperCase());

// ⚡⚡ CONCATENAR
console.log(nombre + apellido);
console.log(nombre + ' ' + apellido); 

// ⚡⚡ PROPIEDADES
console.log(nombre.length);
// let nombreCompleto = 'John Smith';
let nombreCompleto = nombre + ' ' + apellido;
console.log(nombreCompleto.length);
console.log('************************************');

// ⚡⚡ INDICES
console.log(nombreCompleto[0]);
console.log(nombreCompleto[5]);
console.log(nombreCompleto[9]);
console.log(nombreCompleto[nombreCompleto.length - 1]);

// jsmith@continental.edu.pe
let correo = nombre[0] + apellido + '@continental.edu.pe';
console.log(correo);
console.log('*****************************************');

// ⚡⚡ Metodos
// function correr(){}
// correr();
console.log(correo.toLowerCase());
console.log(correo.toUpperCase());

let resultado = nombre.replace('n', 'z');
console.log(resultado);

