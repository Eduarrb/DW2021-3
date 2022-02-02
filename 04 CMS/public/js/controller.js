import * as model from './model.js';
import noticiasVista from './views/noticiasVista.js';

const controllerResultadoNoticias = async function(){
    try {
        await model.cargarResultadosNoticias(`backFetch/noticias_get.php`);
        // console.log(model.estado);
        noticiasVista.render(model.estado.noticias.resultados);
    } catch (error) {
        throw error;
    }
}

controllerResultadoNoticias();