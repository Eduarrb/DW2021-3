const timeout = function(s){
    return new Promise(function(_, reject){
        setTimeout(function(){
            reject(new Error(`La petición demoró demasiado tiempo, el tiempo de espera es de ${s} segundos`))
        }, s * 1000)
    })
}

export const obtenerJson = async function(url){
    try {
        const res = await Promise.race([fetch(`${url}`), timeout(10)]);
        if(!res.ok) throw new Error('Algo salió mal');
        const data = await res.json();
        return data;
    } catch (error) {
        throw error;
    }
}