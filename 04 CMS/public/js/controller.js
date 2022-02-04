import * as model from './model.js';
import noticiasVista from './views/noticiasVista.js';
import paginacionVista from './views/paginacionVista.js';

const controllerResultadoNoticias = async function(getfile){
    try {
        noticiasVista.renderLoad();
        await model.cargarResultadosNoticias(getfile);
        // noticiasVista.render(model.estado.noticias.resultados);
        noticiasVista.render(model.obtenerResultadosPaginacion());
        // paginacionVista.agregarManejadorClick();
        paginacionVista.render(model.estado.noticias);
        // console.log(model.estado.noticias);
    } catch (error) {
        throw error;
    }
}

const controllerPaginacion = function(gotoPage){
    // console.log(gotoPage);
    noticiasVista.render(model.obtenerResultadosPaginacion(gotoPage));
    // console.log(model.estado);
    paginacionVista.render(model.estado.noticias);
}

const url = window.location.pathname.split('/');
// console.log(url);
const urlParams = window.location.search.slice(1).split('=');
// console.log(urlParams);

const init = function(){
    if(url[url.length - 1] === ''){
        controllerResultadoNoticias('backFetch/noticias_get.php');
        paginacionVista.agregarManejadorClick(controllerPaginacion);
    }
    if(url[url.length - 1] === 'categorias.php'){
        // console.log('estamos en categorias');
        controllerResultadoNoticias(`backFetch/noticias_cat_get.php?id=${urlParams[1]}`);
        paginacionVista.agregarManejadorClick(controllerPaginacion);
    }
}

init();