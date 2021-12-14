const form = document.querySelector('.quiz-form');

const respCorrectas = ['A', 'B', 'A', 'B'];

const resultado = document.querySelector('.result');

form.addEventListener('submit', e => {
    e.preventDefault();

    // ⚡⚡ MANIPULAR LAS RESPUESTAS
    // console.log(form.q1.value);
    // console.log(form.q2.value);
    // console.log(form.q3.value);
    // console.log(form.q4.value);
    const respUsuario = [
        form.q1.value, 
        form.q2.value,
        form.q3.value,
        form.q4.value
    ]
    // console.log(respUsuario);

    // for (let i = 0; i < respUsuario.length; i++){
    //     console.log(respUsuario[i]);
    // }
    let puntaje = 0;
    respUsuario.forEach((value, index) => {
        // console.log(value, index);
        if(value === respCorrectas[index]){
            console.log(`la respuesta de la pregunta ${index + 1} es correcta 🎁🎁`);
            puntaje += 25;
        } else {
            console.log(`la respuesta de la pregunta ${index + 1} es erronea 💥💥`);
        }
    });

    // console.log(puntaje);
    resultado.classList.remove('d-none');
    // resultado.querySelector('span').textContent = `${puntaje}%`;

    // console.log(pageYOffset);
    let posicionEjeY = pageYOffset;
    // console.log(posicionEjeY);
    // setInterval(function(){
    //     console.log('soy un mensaje despues de 3 segundos');
    // }, 3000);
    let animacionTop = setInterval(() => {
        if(posicionEjeY <= 0){
            clearInterval(animacionTop);
        } else {
            scrollTo(0, posicionEjeY);
            posicionEjeY -= 5;
        }
        // console.log(posicionEjeY);
    }, 1);

    let sumaPuntajeTotal = 0;
    let velocidad = 40;

    let timer = setInterval(() => {
        resultado.querySelector('span').textContent = `${sumaPuntajeTotal}%`;
        if(sumaPuntajeTotal === puntaje){
            clearInterval(timer);
        } else {
            sumaPuntajeTotal++;
            // velocidad += 50;
            // console.log(velocidad)
        }
    }, velocidad);
});