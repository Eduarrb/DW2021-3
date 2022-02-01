/*!
* Start Bootstrap - Blog Home v5.0.7 (https://startbootstrap.com/template/blog-home)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-home/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

const getJsonNoticias = async function(){
    try {
        const data = await fetch(`backFetch/noticias_get.php`);
        if(!data.ok){
            throw new Error('algo salio mal 💥💥💥');
        }
        const noticias = await data.json();
        return noticias;
    } catch (error) {
        console.log(error);
    }
}

getJsonNoticias().then(data => console.log(data));