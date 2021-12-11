/* ⚡⚡ OBJETOS ⚡⚡ */

// string & arrays son un tipo de objeto
// JSON JAVASCRIPT OBJECT NOTATION
const libro = {
    // caracteristicas y propiedades
    // key - value pair
    titulo: '100 años de soledad',
    fechaPubli: 1960,
    genero: 'Drama',
    precio: 99.99,
    paginas: 765,
    editorial: 'Navarrete',
    autor: 'Gabriel García Marquez'
}

console.log(libro);
console.log(libro.autor);
console.log(libro.precio);

libro.personajes = ['Amaranta', 'Arcadio'];
console.log(libro);

console.log('**************************');

const usuario = {
    nombre: 'Juancho',
    correo: 'juancho@gmail.com',
    cel: '963852147',
    edad: 31,
    saludar: function(){
        console.log(`Bienvenido a la página: ${usuario.nombre}`);
    },
    obtenerEdad: function(fechaNac){
        return 2021 - fechaNac;
    }
}

usuario.saludar();
console.log(usuario.obtenerEdad(1999));
// document.querySelector()
// console.log(usuario);
// usuario.nombre = 'pepito';
// console.log(usuario);

// usuario = {
//     nombre: 'Pedro'
// }

console.log('*********************');
const personaje = {
    nombre: 'Joshi',
    correo: 'joshi@nintendo.com',
    skills: ['saltar', 'comer tortugas', 'sacar la lengua', 'correr', 'escupir fuego'],
    // ⚡⚡ OBJETO GLOBAL 'THIS'
    imprimirThis: function(){
        console.log(this); // objeto 'PERSONAJE'
    },
    saltar: function(){
        console.log(`${this.nombre} puede saltar 20mt`);
        // this.nombre -> personaje.nombre
    },
    imprimirSkills: function(){
        // imprimir cada una de las habilidades en el bloque1 del html en una etiqueta individual P
        let html = '';
        for(let i = 0; i < this.skills.length; i++){
            console.log(this.skills[i]);
            html += `<p>${this.nombre} puede: <strong>${this.skills[i]}</strong></p>`
        }
        console.log(html);
        document.querySelector('.bloque1').innerHTML = html;
    }
}

// console.log(this);
// console.log(window);
personaje.imprimirThis();
personaje.saltar();
personaje.imprimirSkills();
console.log('esta es una linea \n esta es otra linea')