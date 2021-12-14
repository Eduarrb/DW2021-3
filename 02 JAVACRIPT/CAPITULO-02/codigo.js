// AGREGAR LAS TAREAS
const tareaInput = document.querySelector('.tarea');
const btn = document.querySelector('button');
const alerta = document.querySelector('.alerta');
const ul = document.querySelector('ul');
// btn.addEventListener('click', function(){

// })

btn.addEventListener('click', () => {
    // console.log('hiciste click');
    // console.log(tareaInput.value);
    if(tareaInput.value === ''){
        alerta.textContent = 'Debes ingresar una tarea 💥💥';
    } else {
        alerta.innerHTML = '';
        let li = `<li>${tareaInput.value}</li>`;
        ul.insertAdjacentHTML('beforeend', li);
        tareaInput.value = '';
    }
});


// 💡💡 es un tipo de objeto muy parecido a un array
/*
const listaTareas = document.querySelectorAll('li');
console.log(listaTareas);
for(let i = 0; i < listaTareas.length; i++){
    // console.log(listaTareas[i]);
    listaTareas[i].addEventListener('click', () => {
        // console.log('hiciste click');
        listaTareas[i].remove();
    });
}
*/

// ⚡⚡ EVENT DELEGATION ⚡⚡
// 💡💡 delegar el evento a una instancia superior

ul.addEventListener('click', evento => {
    // console.log('hiciste click');
    // console.log(evento.target.tagName);
    if(evento.target.tagName === 'LI'){
        // console.log('ejecuta una accion');
        evento.target.remove();
    }
});