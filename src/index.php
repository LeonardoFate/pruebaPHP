<?php
require_once 'config/database.php';
session_start();

// Obtener mensajes desde la sesión
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : '';
$tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : '';

// Limpiar la sesión después de obtener el mensaje
unset($_SESSION['mensaje']);
unset($_SESSION['tipo']);

// Consulta para obtener todas las citas ordenadas por fecha
$stmt = $pdo->prepare("SELECT * FROM citas ORDER BY fecha_cita ASC, hora_cita ASC");
$stmt->execute();
$citas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-primary">Sistema de Citas Médicas</h1>
            <p class="text-muted">Gestiona citas médicas</p>
        </div>

        <?php if ($mensaje): ?>
        <div class="alert alert-<?php echo $tipo; ?> alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($mensaje); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
        <?php endif; ?>

        <div class="mb-4 text-end">
            <a href="crear_cita.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nueva Cita
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listado de Citas</h5>
            </div>
            <div class="card-body">
                <?php if (count($citas) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Paciente</th>
                                <th>Especialidad</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citas as $cita): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($cita['id']); ?></td>
                                <td><?php echo htmlspecialchars($cita['nombre_paciente']); ?></td>
                                <td><?php echo htmlspecialchars($cita['especialidad']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($cita['fecha_cita'])); ?></td>
                                <td><?php echo date('H:i', strtotime($cita['hora_cita'])); ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-outline-danger btn-sm"
                                        onclick="confirmarEliminar(<?php echo $cita['id']; ?>)">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="alert alert-warning text-center">
                    <i class="bi bi-exclamation-triangle"></i> No hay citas registradas todavía.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
    function confirmarEliminar(id) {
        if (confirm('¿Está seguro de que desea eliminar esta cita?')) {
            window.location.href = 'eliminar_cita.php?id=' + id;
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
