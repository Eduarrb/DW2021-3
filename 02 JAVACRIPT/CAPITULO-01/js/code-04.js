// console.log('funciona');

/* ⚡⚡ ARRAYS - LISTAS ⚡⚡ */
// 💡💡 CONJUNTO DE ELEMENTOS

const numeros = [23, 5341, 8789, 98, 356];
console.log(numeros);

// ⚡⚡ INDICES -> 0 , 1, 2, .....N
console.log(numeros[0]);
console.log(numeros[4]);
console.log(numeros[numeros.length - 1]);
console.log(numeros[10]);

const array1 = [1, [56, 89]];
console.log(array1);
const array2 = ['joshi', 'mario', 'luigui', 'ryo'];
console.log(array2);
const array3 = ['Mana', 1986, 'Rayando el sol', true, 30 + 40, function cantar(){}, 1];
console.log(array3);


console.log(`El array 'numeros' tiene ${numeros.length} elementos`);
console.log('*************************************');

// ⚡⚡ FOR LOOPS
const personajes = ['joshi', 'mario', 'luigui', 'ryo', 'ken', 'guile', 'chun-li', 'blanka'];

for (let i = 0; i < personajes.length; i++){
    console.log(personajes[i]);
}

let html = '';

for (let i = 0; i < personajes.length; i++){
    // 💡💡 PROPIO AMBITO O CONTEXTO -> SCOPE
    // html = html + `<h3>${personajes[i]}</h3>`;
    html += `<h3>${personajes[i]}</h3>`;
}

console.log(html);

const bloqueVideoJuego = document.querySelector('.videoJuego');
console.log(bloqueVideoJuego);

bloqueVideoJuego.innerHTML = html;


// // JSON = JAVASCRIPT OBJECT NOTATION
// const json = {
//     'id': '3y483726432',
//     'nombre': 'juan',
//     'edad': 12
// }

// [{
//     id: '3y483726432',
//     nombre: 'juan',
//     edad: 12
// }]