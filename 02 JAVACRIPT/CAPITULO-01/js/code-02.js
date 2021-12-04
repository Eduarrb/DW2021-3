/* ⚡⚡ NUMBERS ⚡⚡ */
/*
let num = 10;
console.log(num);
num = '315';
console.log(num);
num = true;
console.log(num);
*/
const pi = 3.1416;
// pi = 2.1416;
let radio = 11.5;
console.log(pi, radio);

// ⚡⚡ OPERACIONES MATEMÁTICAS
let areaCirculo = pi * radio ** 2;
console.log(areaCirculo);
console.log('*****************************');

// ⚡⚡ RESIDUO
let num1 = 12;
console.log(num1 % 2);
console.log(num1 % 3);
console.log(num1 % 7);
console.log('*****************************');

// ⚡⚡ SUMA Y RESTA
let num2 = 10;
let num3 = num2 + 4;
console.log(num3);
let num4 = num3 - 7;

console.log(num4); // 7

num4 = num4 + 1;
console.log(num4);
num4 = num4 + 1;
console.log(num4);
num4++; // -> num4 + 1
console.log(num4);
num4--; // -> num4 - 1
console.log(num4);

num4 += 10; // -> num4 = num4 + 10
console.log(num4);
num4 -= 3;
console.log(num4);

num4 **= 3;
console.log(num4);
console.log('*****************************');

// ⚡⚡ Metodos
let num5 = 10.55686751;
console.log(num5);
console.log(num5.toFixed(2));

let rep1 = Math.floor(num5);
console.log(rep1);

let rep2 = Math.ceil(num5);
console.log(rep2);

let rep3 = Math.round(num5);
console.log(rep3);

let aleatorio = Math.random(); // 0.0000001 -> 0.99999999
console.log(aleatorio);

let alea2 = Math.random() * 10;
console.log(alea2);
console.log(Math.floor(alea2));
