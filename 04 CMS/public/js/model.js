import { obtenerJson } from "./helpers.js";

export const estado = {
    noticias: {
        resultados: []
    }
}

export const cargarResultadosNoticias = async function(url){
    try {
        const data = await obtenerJson(`${url}`);
        estado.noticias.resultados = data.resultado.map(el => {
            return {
                id: el.noti_id,
                titulo: el.noti_titulo,
                resumen: el.noti_resumen,
                fecha: el.noti_fecha,
                img: el.noti_img
            }
        });
    } catch (error) {
        throw error;
    }
}