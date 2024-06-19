document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("personaForm").addEventListener("submit", async function(event) {
        event.preventDefault(); // Evita el envío normal del formulario

        let formData = {
            doce_nombre: document.getElementById("doce_nombre").value,
            doce_apellido: document.getElementById("doce_apellido").value,
            per_cumple: document.getElementById("per_cumple").value,
            per_mail: document.getElementById("per_mail").value,
            doce_cel: document.getElementById("doce_cel").value
        };

        try {
            let response = await fetch('php/api/crearApi.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            let result = await response.json();

            if (response.ok) {
                document.getElementById("resultado").innerHTML = `
                    <p>Nombre: ${formData.doce_nombre}</p>
                    <p>Apellido: ${formData.doce_apellido}</p>
                    <p>Fecha de Nacimiento: ${formData.per_cumple}</p>
                    <p>Correo Electrónico: ${formData.per_mail}</p>
                    <p>Celular: ${formData.doce_cel}</p>
                `;
            } else {
                document.getElementById("resultado").innerHTML = `<p>Error: ${result.message}</p>`;
            }
        } catch (error) {
            document.getElementById("resultado").innerHTML = `<p>Error: ${error.message}</p>`;
        }
    });
});
