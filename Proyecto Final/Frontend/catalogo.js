$(document).ready(function () {
    $.ajax({
        url: '../Backend/Api/index.php?method=get_products',
        method: 'GET',
        success: function (response) {
            const productos = JSON.parse(response);
            const $body = $('#catalogo-body');
            $body.empty();

            productos.forEach(producto => {
                const row = `
                    <tr>
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td>$${producto.precio}</td>
                        <td>${producto.descripcion}</td>
                    </tr>
                `;
                $body.append(row);
            });
        }
    });
});
