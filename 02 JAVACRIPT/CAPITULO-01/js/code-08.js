// ⚡⚡ FUNCTION EXPRESSION
saludar('Pepito');

function saludar(name){
    console.log(`Bienvenido ${name}`);
}

// saludar('Pepito');

// ⚡⚡ ARROW FUNCTIONS

// saludar2('Camila'); 💥💥

const saludar2 = (name) => {
    console.log(`Buenas noches ${name}`);
}

saludar2('Camila'); // 👍👍

const sumar = (a, b) => {
    let res = a + b;
    return res;
}

console.log(sumar(2, 7));
const respuesta = sumar(8,1231);
console.log(respuesta);

// const multix2 = (num) => {
//     return num * 2;
// }

// lo hagan en una sola linea de codigo
const multix2 = num => num * 2;

console.log(multix2(6));

const saludar3 = () => `Bienvenidos al curso de JavaScript`;

console.log(saludar3());

const saludar4 = (nom1, nom2) => `Hola ${nom1} y ${nom2}`;
const saludo = saludar4('Jazmin', 'Ernesto');
console.log(saludo);