// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "nombre":"NA",
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
/*
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
        }
    };
    client.send(productoJsonString);
}
*/

///////////////////////////////Fin de la funcion agreagar productos

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}



//Buscar producto por nombre, marca o detalles segun coinicidan

function buscarProducto(e){
document.getElementById("productos").innerHTML = null;
e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var name = document.getElementById('name').value;
    console.log(name);
    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                

                for(var i=0;i<productos.length;i++){
                    let actual = productos[i];
                    let descripcion = '';
                    descripcion += '<li>precio: '+actual.precio+'</li>';
                    descripcion += '<li>unidades: '+actual.unidades+'</li>';
                    descripcion += '<li>modelo: '+actual.modelo+'</li>';
                    descripcion += '<li>marca: '+actual.marca+'</li>';
                    descripcion += '<li>detalles: '+actual.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${actual.id}</td>
                            <td>${actual.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
               //document.getElementById("productos").append(template);
                  //document.getElementById("productos").append(template);
                   document.getElementById("productos").innerHTML += template;
                }

              
                
                /*
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;

                */
            }
        }
    };
    client.send("name="+name);

}

//Insertar  productos nuevos

function agregarProducto(e){

var jasonn = document.getElementById("description").value;//Obteniendo los valores actuales 

var jasonF=JSON.parse(jasonn);//Convirtiendoa de string a JSON para la manipulacion de los atributos

//console.log(jasonF.detalles);//Probando si los atributos se almacenan correctament como un JSON


//Validacion de los campos con sus respectivas reglas

var valido =validar(jasonF.nombre,jasonF.marca,jasonF.modelo,jasonF.precio,jasonF.detalles);



if(valido){//Si los datos son validos que se inserten a la base de datos
    console.log("Todos los datos son correctos");

    //Insertando 


     e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    //var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
  //  var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    //finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(jasonF,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);

        }
    };
    client.send(productoJsonString);
}else{

    console.log("Algun erro en los datos");
}

}




//Funcion para validar los atributos de los productos nuevos 

function  validar(nom,marcaC,modelo,precio,detalles){


  // console.log("Prueba"); Comprobando

 // var nom = document.getElementById('form-name').value;
  //console.log(nom);



  //Validando que en campo de nombre tenga informacion y
  // que no tenga mas de 100 caracteres

  if(nom=="" || nom.length>100 || nom=="NA"){
    window.alert('El campo de nombre no puede estar vacion o ser mayor a 100  caracteres');
    return false;
  } 


  //Validano que haya seleccionado una maraca

  //var marcaC = document.querySelector('input[name = "marca"]:checked');

if(marcaC == "NA"){
    alert('Seleccione una marca');
    return false;
} 


//Validadno que se ingrese texto alfanumerico 
//En el campo de modelo 
//var modelo = document.getElementById('form-modelo').value;


var patron=/[A-ZÑÁËÍÓÚÜa-zñáéíóúü0-9]/;//Los qiue no mqueremoas ;._*$%"&!()¿?{}\/-+$^[]

if ( !patron.test(modelo) )
{
  window.alert('Caracter no valido');
  return false;
}else if(modelo.length>=25){

    window.alert('Solo puede ingresar 25 caracteres');
    return false;
}


//Validando el precio 

//var precio = document.getElementById('form-precio').value;

//Validar que ingrese numeros 

var paNum=/[0-9.]/;
if(!paNum.test(precio)){

window.alert('Solo puede ingresar numeros en el apartado de precio')
return false;
}else{
//Pasndo a entero la entrada validada como numero
var realP=parseInt(precio);

if(realP==""|| realP<=99.99){
    window.alert('Ingrese un precio mayor a 99.99')
    return false;
}

}



//Validando el campo de detalles

//var detalles = document.getElementById('form-detalles').value;

if(detalles.length>250){

    window.alert('Solo puede ingreasar 250 caracteres en el campo de detalles')
    return false;
};



//Validar campo de unidades 



var paNum=/[0-9]/;
if(!paNum.test(precio)){

window.alert('Solo puede ingresar numeros en el apartado de unidades y numeros mayoes a cero');
}else{
//Pasndo a entero la entrada validada como numero
var realP=parseInt(precio);

if(realP==""|| realP<0){
    window.alert('Ingrese un cantidad en el campo de unidades mayor o igual a cero');
    return false;
}

}

/*Esta validacion se hace en la funcion de agregar nuevo producto
//Debio a que ya esta como defautl la imagen predeterminada 
//ya no es necesaria esta validacion, debido a que este no esta vacio

//Validando imagen
var imagen = document.getElementById('form-imagen').value;

if(imagen=='')document.getElementById('form-imagen').value='img/cat.png';
*/


//Si llega a este return significa que paso todas las validaciones

return true;
}


//Cuando se inicie la pagina

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}