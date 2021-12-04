/* ⚡⚡ TEMPLATE STRINGS ⚡⚡ */

const nombre = 'Jaimito';
const apellido = "Arroyo";

let edad = 33;


// 🔥🔥 HOISTING
// Hola soy Eduardo y tengo 19 años
const personaData = 'Hola soy ' + nombre + ' y tengo ' + edad + ' años';
console.log(personaData);

// alt + 96
const perData = `Hola, mi nombre es ${nombre} y tengo ${edad} años`;
console.log(perData);

// const validarEdad = `Eres ${edad >= 18 ? 'apto' : 'no apto' }`;
// console.log(validarEdad);

let html = `
    <h1>Hola Soy ${nombre}</h1>
    <p>Tengo ${edad} años de edad</p>
`;

console.log(html);

const bloque1 = document.querySelector(`.bloque1`);
console.log(bloque1);

bloque1.innerHTML = html;