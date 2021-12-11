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

// EVENT DELEGATION