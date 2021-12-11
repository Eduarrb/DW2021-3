/* ⚡⚡ FUNCIONES ⚡⚡ */
saludar();

// ⭐⭐⭐⭐⭐
function saludar(){
    /* AQUI VA EL CÓDIGO QUE DEBE EJECUTAR LA FUNCION */
    console.log('Hola a todos');
    /* imprima en un div el saludo */
}

const fechaNacimiento = 1990;

// parametro
function obtenerEdad(fechaNacimiento){
    // PROPIO AMBITO, CONTEXTO O SCOPE
    let edad = 2021 - fechaNacimiento;
    console.log(edad);
}

// argumentos
obtenerEdad(1973);

const fechaNacimiento2 = 2000;

function obtenerEdad2(fechaNac){
    let edad = 2030 - fechaNacimiento2;
    console.log(edad);
}

obtenerEdad2();

function saludar2(nombre){
    let saludo = `Buenas noches ${nombre}`;
    document.querySelector('.saludo').textContent = saludo;
}

// saludar2(jaimito); 💥💥💥
// saludar2('Jaimito');
// saludar2(222222);

let nombre = 'Jaimito';

saludar2(nombre);

function sumar(a, b){
    let res = a + b;
    return res;
}

//sumar(5,2); // flotando
console.log(sumar(5,2));

let respuesta1 = sumar(1,3);
console.log(respuesta1);

function resultadosExamen(){
    console.log(`la nota es ${respuesta1}`);
}
resultadosExamen();