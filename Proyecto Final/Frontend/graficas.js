$(document).ready(function () {
    $.ajax({
        url: 'http://localhost:8080/tecweb/Proyecto%20Final/Backend/Api/index.php?method=productos_por_rango',
        method: 'GET',
        success: function (response) {
            const data = JSON.parse(response);
            console.log(data);
            console.log(Array.isArray(data));
            //Datos para el plot de tipo hisyt
           const labels = data.map(row => row.nombre);
           const valores = data.map(item => item.precio);


            //Datos para el plot de tipo pie
           const labelspie = data.map(row => row.nombre);
           const valorespie = data.map(item => item.unidades);

            
            //Configuracion general del grafico de tipo historigmarama 
            //Valores del Historigromam de Productos por rango de precios
            const dataHisto={
                labels: labels,
                    datasets: [{
                        label: 'Nombre de Productos',
                        data: valores,
                        backgroundColor: '#007bff'
                    }]
            };

            //Configuracion del grafico Hist
            const confiHisto={
                 type: 'bar',
                data: dataHisto,
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
            };

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

            //Configuracion general del grafico de tipo pie 
            //Valores del plot de tipo pie
            const dataPie={
                labels: labelspie,
                    datasets: [{
                        label: 'Cantidad de Productos',
                        data: valorespie
                        
                    }]
            };

            //Configuracion del grafico pie
            const confiPie={
                 type: 'pie',
                data: dataPie,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Unidades de Cada Producto'
                        }
                    }
                }
            };




            //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

            //Configuracion general del grafico de tipo pie 
            //Valores del plot de tipo pie
            const dataPolar={
                labels: labelspie,
                    datasets: [{
                        label: 'Cantidad de Productos',
                        data: valorespie
                        
                    }]
            };

            //Configuracion del grafico pie
            const confiPolar={
                 type: 'polarArea',
                data: dataPie,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Unidades Por Area Polar'
                        }
                    }
                }
            };



//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

            //Configuracion general del grafico de tipo pie 
            //Valores del plot de tipo pie
            const dataDispercion={
                labels: labels,
                    datasets: [{
                        label: 'Precio de Productos',
                        data: valores,
                        backgroundColor: '#e60b0b73', // Fondo del gráfico
borderColor: "#f10505ff", // Lineas que bordean el gráfico
pointBackgroundColor: "#1d1b1bff", // Punto del gráfico
pointBorderColor: "#e61616ff", // Circunferencia que bordean el punto del gráfico 

                    }]
            };

            //Configuracion del grafico pie
            const confiDispercion={
                 type: 'line',
                data: dataDispercion,
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Gafico de lineas dado el precio'
                        }
                    }
                }
            };




            //Rendeerizadno los plots

            //Renderizando el plot hist
            const HistoChart = new Chart(
            document.getElementById('graficaPrecios').getContext('2d'),
            confiHisto
            );
           
            //Renderizadao de plots de tipo pie

            const pieChart = new Chart(
            document.getElementById('graficaUnidades').getContext('2d'),
            confiPie
            );


             //Renderizadao de plots de tipo polar

            const polarChart = new Chart(
            document.getElementById('graficaPolares').getContext('2d'),
            confiPolar
            );


            //Renderizadao de plots de tipo dispercion

            const polarDisper = new Chart(
            document.getElementById('graficaDispercion').getContext('2d'),
            confiDispercion
            );
        }
    });
});
