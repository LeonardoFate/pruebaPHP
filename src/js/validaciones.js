document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formCita');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Bandera para controlar si hay errores
        let hayErrores = false;

        // Validar nombre del paciente
        const nombrePaciente = document.getElementById('nombre_paciente');
        if (nombrePaciente.value.trim() === '') {
            nombrePaciente.classList.add('is-invalid');
            hayErrores = true;
        } else {
            nombrePaciente.classList.remove('is-invalid');
            nombrePaciente.classList.add('is-valid');
        }

        // Validar especialidad
        const especialidad = document.getElementById('especialidad');
        if (especialidad.value === '') {
            especialidad.classList.add('is-invalid');
            hayErrores = true;
        } else {
            especialidad.classList.remove('is-invalid');
            especialidad.classList.add('is-valid');
        }

        // Validar fecha
        const fechaCita = document.getElementById('fecha_cita');
        const fechaActual = new Date();
        fechaActual.setHours(0, 0, 0, 0);

        const fechaSeleccionada = new Date(fechaCita.value);

        if (fechaCita.value === '' || fechaSeleccionada < fechaActual) {
            fechaCita.classList.add('is-invalid');
            hayErrores = true;
        } else {
            fechaCita.classList.remove('is-invalid');
            fechaCita.classList.add('is-valid');
        }

        // Validar hora
        const horaCita = document.getElementById('hora_cita');
        if (horaCita.value === '') {
            horaCita.classList.add('is-invalid');
            hayErrores = true;
        } else {
            horaCita.classList.remove('is-invalid');
            horaCita.classList.add('is-valid');
        }

        // Si no hay errores, enviar el formulario
        if (!hayErrores) {
            form.submit();
        }
    });

    // Establecer fecha mínima para el selector de fecha
    const fechaInput = document.getElementById('fecha_cita');
    if (fechaInput) {
        const hoy = new Date();
        const año = hoy.getFullYear();
        let mes = hoy.getMonth() + 1;
        let dia = hoy.getDate();

        // Formatear mes y día para que tengan dos dígitos
        mes = mes < 10 ? '0' + mes : mes;
        dia = dia < 10 ? '0' + dia : dia;

        const fechaMinima = `${año}-${mes}-${dia}`;
        fechaInput.setAttribute('min', fechaMinima);
    }
});
