import * as model from './model.js';
import noticiasVista from './views/noticiasVista.js';
import paginacionVista from './views/paginacionVista.js';

const controllerResultadoNoticias = async function(){
    try {
        noticiasVista.renderLoad();
        await model.cargarResultadosNoticias(`backFetch/noticias_get.php`);
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

controllerResultadoNoticias();
// model.obtenerResultadosPaginacion(2);
// console.log(model.estado);
paginacionVista.agregarManejadorClick(controllerPaginacion);