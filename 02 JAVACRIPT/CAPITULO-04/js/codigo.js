const form = document.querySelector('.quiz-form');

const respCorrectas = ['A', 'B', 'A', 'B'];

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

    console.log(puntaje);

});