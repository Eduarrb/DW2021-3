

console.log('funciona');

// 1 ⚡⚡ CONCEPTOS
// JSON -> Javascript Object Notation

fetch("data/personas.json").then(respuesta => console.log(respuesta.json()));

fetch("https://api.discogs.com/artists/1/releases?page=2&per_page=75").then(respuesta => console.log(respuesta.json()));
// console.log(data);
// fetch('archivo - URL')

// ⚡⚡ EJECUCIONES SYNC
let nombre = 'Juan';
console.log(nombre);
console.log('Esta es una 3ra ejecucion sincrona');

// ⚡⚡ EJECUCIONES ASYNC
setInterval(() => {
    console.log('esta es una ejecucion asincrona');
}, 3000);
