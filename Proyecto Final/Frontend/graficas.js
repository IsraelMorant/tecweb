$(document).ready(function () {
    $.ajax({
        url: 'http://localhost/product_app/backend/myapi/index.php?method=productos_por_rango',
        method: 'GET',
        success: function (response) {
            const data = JSON.parse(response);

            const labels = data.map(item => item.rango);
            const valores = data.map(item => item.total);

            const ctx = document.getElementById('graficaPrecios').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de Productos',
                        data: valores,
                        backgroundColor: '#007bff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Productos por Rango de Precio'
                        }
                    }
                }
            });
        }
    });
});
