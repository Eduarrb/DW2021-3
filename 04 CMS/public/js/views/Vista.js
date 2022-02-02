export default class Vista{
    _data;
    render(data){
        this._data = data;
        const plantilla = this._generarPlantilla();
        // console.log(plantilla);
        this._clear();
        this._elementoPadre.innerHTML = plantilla;
    }   

    _clear(){
        this._elementoPadre.innerHTML = '';
    }
}