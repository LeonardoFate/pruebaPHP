<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Cita Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top-4">
                        <h3 class="mb-0"><i class="bi bi-calendar-plus"></i> Registrar Nueva Cita Médica</h3>
                    </div>

                    <div class="card-body p-4">
                        <form id="formCita" action="guardar_cita.php" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="nombre_paciente" class="form-label">Nombre del Paciente</label>
                                <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente"
                                    required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese el nombre del paciente.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="especialidad" class="form-label">Especialidad</label>
                                <select class="form-select" id="especialidad" name="especialidad" required>
                                    <option value="">Seleccione una especialidad</option>
                                    <option value="Medicina General">Medicina General</option>
                                    <option value="Pediatría">Pediatría</option>
                                    <option value="Dermatología">Dermatología</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, seleccione una especialidad.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
                                <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
                                <div class="invalid-feedback">
                                    Por favor, seleccione una fecha válida.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hora_cita" class="form-label">Hora de la Cita</label>
                                <input type="time" class="form-control" id="hora_cita" name="hora_cita" required>
                                <div class="invalid-feedback">
                                    Por favor, seleccione una hora válida.
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="index.php" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Guardar Cita
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation, #formCita');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    </script>

</body>

</html>
