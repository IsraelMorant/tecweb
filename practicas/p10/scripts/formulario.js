function validar(){


  // console.log("Prueba"); Comprobando

  var nom = document.getElementById('form-name').value;
  //console.log(nom);



  //Validando que en campo de nombre tenga informacion y
  // que no tenga mas de 100 caracteres

  if(nom=="" || nom.length>100) window.alert('El campo de nombre no puede estar vacion o ser mayor a 100  caracteres');


  //Validano que haya seleccionado una maraca

  var marcaC = document.querySelector('input[name = "marca"]:checked');

if(marcaC == null)alert('Seleccione una marca'); 


//Validadno que se ingrese texto alfanumerico 
//En el campo de modelo 
var modelo = document.getElementById('form-modelo').value;


var patron=/[A-ZÑÁËÍÓÚÜa-zñáéíóúü0-9]/;//Los qiue no mqueremoas ;._*$%"&!()¿?{}\/-+$^[]

if ( !patron.test(modelo) )
{
  window.alert('Caracter no valido');
}else if(modelo.length>=25){

    window.alert('Solo puede ingresar 25 caracteres');
}


//Validando el precio 

var precio = document.getElementById('form-precio').value;

//Validar que ingrese numeros 

var paNum=/[0-9.]/;
if(!paNum.test(precio)){

window.alert('Solo puede ingresar numeros en el apartado de precio')
}else{
//Pasndo a entero la entrada validada como numero
var realP=parseInt(precio);

if(realP==""|| realP<=99.99)window.alert('Ingrese un precio mayor a 99.99')

}



//Validando el campo de detalles

var detalles = document.getElementById('form-detalles').value;

if(detalles.length>250)window.alert('Solo puede ingreasar 250 caracteres en el campo de detalles');



//Validar campo de unidades 



var paNum=/[0-9]/;
if(!paNum.test(precio)){

window.alert('Solo puede ingresar numeros en el apartado de unidades y numeros mayoes a cero');
}else{
//Pasndo a entero la entrada validada como numero
var realP=parseInt(precio);

if(realP==""|| realP<0)window.alert('Ingrese un cantidad en el campo de unidades mayor o igual a cero');

}


//Validando imagen
var imagen = document.getElementById('form-imagen').value;

if(imagen=='')document.getElementById('form-imagen').value='img/cat.png';


}



//Redirgeindo ala pagina de formulario para relaizar la
