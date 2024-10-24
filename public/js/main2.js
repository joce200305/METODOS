$.ajax({
    url: './app/controller/login.php', 
    type: 'POST',
    data: { usuario: usuario, password: password, metodo: 'login' },  
    success: function(response) {
        const resultado = JSON.parse(response);
        if (resultado.success) {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: 'Inicio de sesión correctamente.',
            }).then(() => {
                window.location.href = 'index.php';
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Credenciales incorrectas.',
            });
        }
    },
    error: function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error en la conexión.',
        });
    }
});
