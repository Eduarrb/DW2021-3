// console.log('la variable es 20');
// KEY SENSITIVE
// let num = 12;
// let nav = document.querySelector('nav') // etiqueta
const nav = document.querySelector('.header__nav');

window.addEventListener('scroll', function(){
    // console.log('hiciste scroll');
    // nav.classList.add('active');
    // console.log(window.pageYOffset)
    if(window.pageYOffset > 0){
        nav.classList.add('active');
    }
    else{
        nav.classList.remove('active')
    }
});