const libro = {
    // caracteristicas y propiedades
    // key - value pair
    titulo: '100 años de soledad',
    fechaPubli: 1960,
    genero: 'Drama',
    precio: 99.99,
    paginas: 765,
    editorial: 'Navarrete',
    autor: 'Gabriel García Marquez',

    leer(){
        console.log('Estas leyendo el libro');
    }
}

// libro.leer();
/**********************************************/

class Vehiculo{
    constructor(marca, modelo){
        this.marca = marca;
        this.modelo = modelo;
    }
    arrancar(){
        console.log(`El carro ${this.marca} esta en marcha`);
        const carga = this.cargarMaterial();
        console.log(carga);
    }
}

const toyota = new Vehiculo('toyota', 'yaris');
const subaru = new Vehiculo('subaru', 'sport');
// console.log(subaru);
// console.log(toyota);
// toyota.arrancar();
// subaru.arrancar();

class VehiculoPesado extends Vehiculo{
    constructor(marca, modelo, cantiCarga, alquiler){
        super(marca, modelo);
        this.cantiCarga = cantiCarga;
        this.alquiler = alquiler;
    }
    cargarMaterial(){
        return 'esta cargando material';
    }
}

const caterpilar = new VehiculoPesado('caterpilar', 'bp1234', '2tn', 1236.96);
// console.log(caterpilar);
// caterpilar.arrancar();
// caterpilar.cargarMaterial();
// toyota.cargarMaterial();
caterpilar.arrancar();