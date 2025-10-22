// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
}


//JQuery:


$(document).ready(function(){//Cuando el documeto se cargue completamente entonces 

$.ajax({//Para cargar dinamicamente los datos de la base de datos
    url: './backend/product-list.php',
    type: 'GET',

    succes: function(response){
       let products= JSON.parse(response);
       let template = '';

       products.forEach(product => {
        
       });
    }


});



});
