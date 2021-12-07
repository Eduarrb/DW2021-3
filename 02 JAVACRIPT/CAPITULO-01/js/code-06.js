/* ⚡⚡ LOOPS + CONDICIONALES ⚡⚡ */

let nombres = ['ken', 'ryo', 'Guile', 'Chun-li', 'Bison', 'Sangief'];
// console.log(nombres);
for (let i = 0; i < nombres.length; i++){
    console.log(nombres[i]);
}
console.log('*****************************');

// 💡💡 WHILE -> mientras se cumpla la condicion, ejecuta el loop.

let i = 0;
while(i < nombres.length){
    console.log(nombres[i]);
    i++;
}

const ciudades = ['Lima', 'Huancayo', 'Tumbes', 'Arequipa', 'Oxapampa', 'Cuzco', 'Tarma', 'Cajamarca'];

// TODO -> REALIZAR
// CON EL LOOP WHILE, IMPRIMIR LAS CIUDADES EN EL ELEMENTO CON LA CLASE CIUDADES.
let j = 0;
let plantilla = '';

while(j < ciudades.length){
    plantilla += `<p>${ciudades[j]}</p>`
    j++;
}
console.log(plantilla);

const etqCiudades = document.querySelector('.ciudades');
etqCiudades.innerHTML = plantilla;