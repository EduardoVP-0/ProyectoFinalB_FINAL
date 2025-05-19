// JS PARA EL BUSCADOR DE EXCURSIONES
document.getElementById('searchFormpack').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('fecha').trim(); // Obtener el valor de la fecha

    // Si no se ha seleccionado una fecha, usamos un valor especial para indicar "todos los registros"
    if (queryValue === "") {
        formData.set('fecha', '%'); // Esto actúa como un comodín en SQL
    }

    fetch('controlador/historial_pack.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#paquetes table tbody');
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});


// JS PARA EL BUSCADOR DE EXCURSIONES
document.getElementById('searchFormexcu').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('fecha').trim(); // Obtener el valor de la fecha

    // Si no se ha seleccionado una fecha, usamos un valor especial para indicar "todos los registros"
    if (queryValue === "") {
        formData.set('fecha', '%'); // Esto actúa como un comodín en SQL
    }

    fetch('controlador/historial_excu.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#excursiones table tbody');
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});


// JS PARA EL BUSCADOR DE VUELOS
document.getElementById('searchFormvuelo').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('fecha').trim(); // Obtener el valor de la fecha

    // Si no se ha seleccionado una fecha, usamos un valor especial para indicar "todos los registros"
    if (queryValue === "") {
        formData.set('fecha', '%'); // Esto actúa como un comodín en SQL
    }

    fetch('controlador/historial_vuelo.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#vuelos table tbody');
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});


// JS PARA EL BUSCADOR DE CARROS
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('fecha').trim(); // Obtener el valor de la fecha

    // Si no se ha seleccionado una fecha, usamos un valor especial para indicar "todos los registros"
    if (queryValue === "") {
        formData.set('fecha', '%'); // Esto actúa como un comodín en SQL
    }

    fetch('controlador/historial_rentacarro.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#carros table tbody');
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});



const form = document.querySelector("form"); // Seleccionar el formulario
    const mensajeAlerta = document.createElement("div"); // Contenedor para alertas
    mensajeAlerta.id = "mensajeAlerta";
    document.body.appendChild(mensajeAlerta); // Agregarlo al cuerpo del documento

    form.addEventListener("submit", async (e) => {
        e.preventDefault(); // Evitar el envío del formulario tradicional

        // Crear un objeto FormData con los datos del formulario
        const formData = new FormData(form);

        try {
            const response = await fetch("controlador/comentario.php", {
                method: "POST",
                body: formData,
            });

            const result = await response.json();

            // Mostrar mensaje al usuario
            mensajeAlerta.textContent = result.message;
            mensajeAlerta.className = result.status === "success" ? "alert alert-success" : "alert alert-danger";

            // Ocultar el mensaje después de 3 segundos
            setTimeout(() => {
                mensajeAlerta.textContent = "";
                mensajeAlerta.className = "";
            }, 3000);

            // Si es exitoso, puedes limpiar el formulario
            if (result.status === "success") {
                form.reset();
            }
        } catch (error) {
            console.error("Error en la solicitud:", error);
        }
    });


    document.getElementById("emailInput").addEventListener("input", function() {
        const email = document.getElementById("emailInput").value.trim().toLowerCase();  // Convertir a minúsculas y eliminar espacios
        
        // Definir los valores predefinidos
        const datosClientes = {
            "9613266784az@gmail.com": {
                nombre: "Karla Stephanie",
                apaterno: "Robles",
                amaterno: "Miranda"
            },
            "correo2@example.com": {
                nombre: "José Elias",
                apaterno: "Guzmán",
                amaterno: "Miranda"
            },
            "correo3@example.com": {
                nombre: "Rosa",
                apaterno: "Luz",
                amaterno: "Miranda"
            }
            // Agrega más correos y valores según lo necesites
        };
    
        // Si el correo coincide con uno de los predefinidos
        if (datosClientes[email]) {
            // Rellenar los campos con los datos del cliente
            document.getElementById("nombre").value = datosClientes[email].nombre;
            document.getElementById("apaterno").value = datosClientes[email].apaterno;
            document.getElementById("amaterno").value = datosClientes[email].amaterno;
        } else {
            // Si no se encuentra el correo, limpiar los campos
            document.getElementById("nombre").value = "";
            document.getElementById("apaterno").value = "";
            document.getElementById("amaterno").value = "";
        }
    });
    