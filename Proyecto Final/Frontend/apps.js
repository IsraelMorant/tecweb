$('#loginBtn').on('click', function () {
    const data = {
        usuario: $('#usuario').val(),
        password: $('#password').val()
    };

    $.ajax({
        url: 'http://localhost:8080/Proyecto%20Final/Backend/Api/index.php?method=login',
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
