$('#loginBtn').on('click', function () {
    const data = {
        usuario: $('#usuario').val(),
        password: $('#password').val()
    };

    $.ajax({
        url: 'http://localhost:8080/tecweb/Proyecto%20Final/Backend/Api/index.php?method=login',//Moidifcando el url para cada computadora donde se ejecute, y ajustando correctamente las referencias
        method: 'POST',
        data: JSON.stringify(data),
        contentType: 'application/json',
        success: function (response) {
            const res = JSON.parse(response);
            alert(res.message);
            if (res.status === 'success') {
                // Redirigir al dashboard
                window.location.href = 'dashboard.html';
            }
        }
    });
});
