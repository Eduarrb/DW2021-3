import Vista from "./Vista.js";

class NoticiasVista extends Vista{
    _elementoPadre = document.querySelector('.noticias');
    _mensajeError = 'No se encontro ninguna noticia';
    _generarPlantilla(){
        return this._data.map(this._generarPlantillaPrevia).join('');
    }
    _generarPlantillaPrevia(el){
        return `
            <div class="col-lg-6">
                <div class="card mb-4">
                    <a href="post.php?id=${el.id}"><img class="card-img-top" src="img/${el.img}" alt="${el.titulo}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">${el.fecha}</div>
                        <h2 class="card-title h4">${el.titulo}</h2>
                        <p class="card-text">${el.resumen}</p>
                        <a class="btn btn-primary" href="post.php?id=${el.id}">Leer más →</a>
                    </div>
                </div>
            </div>
        `;
    }
}

export default new NoticiasVista();