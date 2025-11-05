


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


console.log("JQuery Funcionando");

$('#product-result').hide();



fetchProducts();

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
    e.preventDefault();
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

$(document).on('click','.product-eliminar',function(){//PAra elimianr un producto conun boton de cada producto


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

        baseJSON = {
                "precio":product[0].precio,
                "unidades": product[0].unidades,
                "modelo": `${product[0].modelo}` ,
                "marca": `${product[0].marca}`,
                "detalles":  `${product[0].detalles}`,
                "imagen": `${product[0].imagen}`
        };
        //const productStr = JSON.stringify(product[0]);
        //console.log(product) ;
        $('#name').val(product[0].nombre);
        $('#description').val(JSON.stringify(baseJSON,null,2));
        $('#productId').val(product[0].id);
        editar = true;
    })

});

});