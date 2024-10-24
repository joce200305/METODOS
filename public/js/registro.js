document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registroForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        const formData = new FormData(this); 
        formData.append('metodo', 'registrarUsuario');

        fetch('./app/controller/usuarios.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) 
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: data.message,
                }).then(() => {
                    window.location.href = 'login.php'; 
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message,
                });
            }
        })
        .catch(() => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error en el servidor.',
            });
        });
    });
});