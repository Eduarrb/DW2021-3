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
        nav.classList.remove('active');
    }
});

const btnMenu = document.querySelector('.header__nav__contenedor--btn');

const menu = document.querySelector('.header__nav__contenedor__menu');

btnMenu.addEventListener('click', function(){
    // console.log('click');
    menu.classList.toggle('active');
});
/*
12 = 12 💥💥💥💥💥
12 == 12 👍👍
12 === 12 👍👍👍
*/

/*
let k = 0
btnMenu.addEventListener('click', function(){
    if (k % 2 == 0) {
        menu.classList.add('active');
    } else {
        menu.classList.remove('active');     
    }
k += 1;
})
*/