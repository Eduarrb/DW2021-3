const btn = document.querySelector('button');

const popup = document.querySelector('.popup-caja');

const btnClose = document.querySelector('.popup-close');

btn.addEventListener('click', () => {
    popup.classList.add('mostrarCaja');
});

btnClose.addEventListener('click', function(){
    popup.classList.remove('mostrarCaja');
});

window.addEventListener('keyup', e => {
    // console.log(e);
    // console.log(e.keyCode);
    // if(e.keyCode === 27){
    if(e.key === 'Escape'){
        console.log('presionaste escape');
        popup.classList.remove('mostrarCaja');
    }
});

popup.addEventListener('click', e => {
    // console.log(e.target.classList);
    if(e.target.classList.contains('popup-caja')){
        popup.classList.remove('mostrarCaja');
    }
})