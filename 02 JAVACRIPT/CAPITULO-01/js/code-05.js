/* ⚡⚡ CONDICIONALES & BOOLEANOS ⚡⚡ */
// TRUE
// FALSE

let num = 23;

// 💡💡 OPERADORES DE COMPARACION
// IGUALDAD -> ==, ===
// ASIGNACION -> =
// 🔥🔥 HOISTING
// 12 == '12' -> TRUE  

// >, >=, <, <=, !=, !== 

if(num === '23'){
    console.log('si son iguales');
} else {
    console.log('son distintos');
}

console.log('***********************************');

// if(num >= Number('20')){
if(num >= +'20'){
    console.log(`el número ${num} es mayor a 20`);
} else {
    console.log(`el número ${num} no es mayor a 20`);
}
console.log('******************************');

// if(num <> '23'){ -> no funciona en JS
if(num !== '23'){
    console.log(`El número ${num} es diferente que el string '23'`);
} else {
    console.log(`El número ${num} es igual que el string '23'`)
}

