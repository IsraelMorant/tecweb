


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
   
    // SE LISTAN TODOS LOS PRODUCTOS
   // listarProductos();
}


//JQuery:

$(document).ready(function(){//Cuando la pagina se haya termindao de cargar 





    let editar = false;
    let lisVAl=false;

console.log("JQuery Funcionando");

$('#product-result').hide();



fetchProducts();

//Para decir si ese nombre ya existe cuando se tecle al querer dar de alta un nuevo producto
$("#name").keyup(function(){
    

 if($('#name').val()){
   let search = $('#name').val();
   
   console.log(search);

  $.ajax({//Buscador dinamico con cada letra que se agrega
    url: './backend/product-search-name.php',
    type:'POST',
    data: { search },
    success: function(response){
      let products = response;
      console.log(products);
      

     
       
        
        if(products==1){
         $('#container').html("El nombre ingresado ya exite");
      $('#product-result').show();
    }
    else{
         $('#container').html("");
      $('#product-result').show();
    }
   

     
        }

     });


    }
    
    

});


$('#search').keyup(function(e){
    if($('#search').val()){
   let search = $('#search').val();

   console.log(search);

  $.ajax({//Buscador dinamico con cada letra que se agrega
    url: './backend/product-search.php',
    type:'POST',
    data: { search },
    success: function(response){
      let products =  JSON.parse(response);
      //console.log(products);
      let template = '';

      products.forEach(product =>{

        template += `<li>
            ${product.nombre}
        </li>`

      });

      $('#container').html(template);
      $('#product-result').show();
        }

     });


    }
});




$('#product-form').submit(function(e){
   // console.log("Enviando nuevo ");
   // console.log(validar());
   if($('#name').val()=="" || $('#precio').val()==""  || $('#unidades').val()=="" || $('#modelo').val()=="" || $('#marca').val()=="" || $('#detalles').val()==""  || $('#detalles').val()==""  || $('#imagen').val()=="" ){
    lisVAl=false;
   }else{
   lisVAl= true
   }

    if(lisVAl==true){
         const postData = {

        nombre: $('#name').val(),
        precio: $('#precio').val(),
        unidades: $('#unidades').val(),
        modelo: $('#modelo').val(),
        marca: $('#marca').val(),
        detalles: $('#detalles').val(),
        imagen: $('#imagen').val(),
        id: $('#productId').val()
    };
    
    let url =  editar === false ? './backend/product-add.php' : './backend/product-edit.php'

    $.post(url, postData, function(response) {
       const st = JSON.parse(response);
        let status = "Estatus: "+st.status+" <br>Mensaje: "+st.message;
        console.log(response);
         $('#container').html(status);
      $('#product-result').show();
        fetchProducts();
        

        $('#product-form').trigger('reset');
       
    });
   //console.log(postData);
   editar=false;
   lisVAl=false;
    e.preventDefault();
    }else{
        $('#container').html("Rellene los campos");
        $('#product-result').show();
    }

   
});








function fetchProducts(){

    
$.ajax({//Para mostrar la informacion dinamciacmente ciuando

        url:'./backend/product-list.php',
        type: 'GET',
        success: function(response){
            let products = JSON.parse(response);

            let template = '';
            products.forEach(product => {
            
                template += `
                    <tr productId="${product.id}">
                        <td >${product.id}</td>
                        <td>
                            <a href="#" class="product-item">${product.nombre}</a>
                        </td>
                        <td>${product.detalles}</td>
                        <td>
                            <button class="product-eliminar btn btn-danger">
                            Eliminar
                            </button>
                        </td>
                    </tr>
                `

            });

            $('#products').html(template);
        
        }

    })

}

$(document).on('click','.product-eliminar',function(){//Para elimianr un producto conun boton de cada producto


        if(confirm('¿Seguro que quires elminar el prodcuto?')){

            //console.log("Eliminar")//Comprobando que el boton si tenga el envento ligada
//console.log(this);


let element = $(this)[0].parentElement.parentElement;

let id = $(element).attr('productId');
//console.log(id);

$.post('./backend/product-delete.php', {id}, function(response) {

     const st = JSON.parse(response);
        let status = "Estatus: "+st.status+" <br>Mensaje: "+st.message;
        
         $('#container').html(status);
      $('#product-result').show();
    console.log(response);
    fetchProducts();

})

        }
});






$(document).on('click',".product-item", function(){

    //console.log("Modificando");

    let element = $(this)[0].parentElement.parentElement;

    let id = $(element).attr('productId');

  //  console.log(id);

    $.post('./backend/product-single.php', {id}, function(response){
        


        console.log(response);

        const product = JSON.parse(response);
        
        //Modificando la base JSON segun el producto
/*
        baseJSON = {
                "precio":product[0].precio,
                "unidades": product[0].unidades,
                "modelo": `${product[0].modelo}` ,
                "marca": `${product[0].marca}`,
                "detalles":  `${product[0].detalles}`,
                "imagen": `${product[0].imagen}`
        };
        */
       //Enviando la informacion del producto seleccionado a mis inputs
        $('#name').val(product[0].nombre);
        $('#precio').val(product[0].precio);
        $('#unidades').val(product[0].unidades);
        $('#modelo').val(product[0].modelo);
        $('#marca').val(product[0].marca);
        $('#detalles').val(product[0].detalles);
        $('#imagen').val(product[0].detalles);
        $('#productId').val(product[0].id);
        //const productStr = JSON.stringify(product[0]);
        //console.log(product) ;
       
        editar = true;
    })

});





//Validaciones de los campos de informacion


  
    

//Validando el campo de nombre
$("#name").blur(function(){

    
  var nom = $("#name").val();
  //console.log(nom);



  //Validando que en campo de nombre tenga informacion y
  // que no tenga mas de 100 caracteres
    let status = "El campo de nombre no puede estar vacio o ser mayor a 100  caracteres";

  if(nom=="" || nom.length>100){
    $('#container').html(status);
   // lisVAl=false;
  }else{//Si no se cumple significa que el dato ingresado es correcto
    $('#container').html("");
   // lisVAl=true;
  }
//Mostrando la alerta
$('#product-result').show();

});


//Validando el campo de marca


$("#marca").blur(function(){


    var marcaC = $("#marca").val();

    if(marcaC == ""){
        $('#container').html("Rellene el campo marca"); 
       // lisVAl=false;
    }else{
        $('#container').html("");
       // lisVAl=true;
    }
    
    $('#product-result').show();
});


//Validando el campo de modelo

$("#modelo").blur(function(){
    
    //Validadno que se ingrese texto alfanumerico 
    //En el campo de modelo 
    var modelo = $("#modelo").val();

    console.log(modelo);

    var patron=/^[a-z0-9]+$/i;//Los qiue no mqueremoas ;._*$%"&!()¿?{}\/-+$^[]


   // var correcto =  !patron.test(modelo) === true ? "Cadena invalida" : 'cadena valida'

    //console.log(correcto);

    if(modelo==""){

        $('#container').html("Rellene el campo de modelo");
      //  lisVAl=false;
    }

    
    if (patron.test(modelo) ){
        
        $('#container').html("");
       // lisVAl=true;
    }else {
        $('#container').html("Caracter no valido");
//lisVAl=false;
    }

    if(modelo.length>=25){

            $('#container').html("Solo puede ingresar 25 caracteres");
           // lisVAl=false;
        
        }

    
    $('#product-result').show();
});


//Validano el input de precio

$("#precio").blur(function(){

    
    var precio = $("#precio").val();

    //Validar que ingrese numeros 

    var paNum=/[0-9.]/;
    if(!paNum.test(precio)){
        $('#container').html("Solo puede ingresar numeros en el apartado de precio");
       // lisVAl=false;
    }else{
        //Pasndo a entero la entrada validada como numero
        var realP=parseInt(precio);

        if(realP==""|| realP<=99.99){
            $('#container').html("Ingrese un precio mayor a 99.99");
           // lisVAl=false;
        }else{
            $('#container').html("");
          //  lisVAl=true;
        }
    }
     $('#product-result').show();
});


//Validando el campo de detalles
$("#detalles").blur(function(){

var detalles = $("#detalles").val();

if(detalles.length>250){
    $('#container').html("Solo puede ingreasar 250 caracteres en el campo de detalles");
  //  lisVAl=false;
}else{
    $('#container').html("");
   // lisVAl=true;
}
$('#product-result').show();
});




//Validando campo de unidades

$("#unidades").blur(function(){

    var unidades = $("#unidades").val();
    var paNum=/[0-9]/;
    if(!paNum.test(unidades)){
        $('#container').html("Solo puede ingresar numeros en el apartado de unidades y numeros mayores a cero");
     //   lisVAl=false;
    }else{
    //Pasndo a entero la entrada validada como numero
        var realU=parseInt(unidades);
        console.log(realU)
    if(realU!=0 && realU<0){
            $('#container').html("Ingrese un cantidad en el campo de unidades mayor o igual a cero");
           // lisVAl=false;
        }else{
            $('#container').html("");
           // lisVAl=true;
        }
    }   


    $('#product-result').show();
});


//Validando campo de imagen

$("#imagen").blur(function(){


    var imagen = $("#imagen").val();

    if(imagen=='')$("#imagen").val("img/cat.png");


});



});