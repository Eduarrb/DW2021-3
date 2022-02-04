import { obtenerJson } from "./helpers.js";

export const estado = {
    noticias: {
        resultados: [],
        pagina: 1,
        resultadosPorPagina: 2
    },
    fechaOptions:  { 
        weekday: 'short', 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric' 
    }

}

export const cargarResultadosNoticias = async function(url){
    try {
        const data = await obtenerJson(`${url}`);
        estado.noticias.resultados = data.resultado.map(el => {
            const fecha = new Date(el.noti_fecha);
            return {
                id: el.noti_id,
                titulo: el.noti_titulo,
                resumen: el.noti_resumen,
                fecha: fecha.toLocaleDateString("es-ES", estado.fechaOptions),
                img: el.noti_img
            }
        });
    } catch (error) {
        throw error;
    }
}

export const obtenerResultadosPaginacion = function(pagina = estado.noticias.pagina){
    estado.noticias.pagina = pagina;
    // console.log(estado.noticias.pagina);
    const inicio = (pagina - 1) * estado.noticias.resultadosPorPagina;
    const final = pagina * estado.noticias.resultadosPorPagina;
    // console.log(inicio, final);
    return estado.noticias.resultados.slice(inicio, final);
}