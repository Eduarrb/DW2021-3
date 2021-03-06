export default class Vista{
    _data;
    render(data){
        if(!data || (Array.isArray(data) && data.length === 0)) return this.renderError();
        this._data = data;
        const plantilla = this._generarPlantilla();
        // console.log(plantilla);
        // if(!this._elementoPadre) return;
        this._clear();
        this._elementoPadre.innerHTML = plantilla;
    }   
    
    _clear(){
        // if(!this._elementoPadre) return;
        this._elementoPadre.innerHTML = '';
    }
    renderLoad(){
        // if(!this._elementoPadre) return;
        const plantilla = `
            <div class="d-flex justify-content-center mb-4">
                <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `;
        this._clear();
        this._elementoPadre.innerHTML = plantilla;
    }
    renderError(mensaje = this._mensajeError){
        const plantilla = `
            <div>
                ${mensaje} 💥💥
            </div>
        `;
        this._clear();
        this._elementoPadre.innerHTML = plantilla;
    }
}