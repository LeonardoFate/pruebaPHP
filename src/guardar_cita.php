<?php
session_start(); // <-- MUY IMPORTANTE
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores = [];

    // Validar nombre del paciente
    if (empty($_POST['nombre_paciente'])) {
        $errores[] = "El nombre del paciente es obligatorio";
    } else {
        $nombre_paciente = trim($_POST['nombre_paciente']);
    }

    // Validar especialidad
    if (empty($_POST['especialidad'])) {
        $errores[] = "Debe seleccionar una especialidad";
    } else {
        $especialidad = $_POST['especialidad'];
        $especialidades_validas = ['Medicina General', 'Pediatría', 'Dermatología'];
        if (!in_array($especialidad, $especialidades_validas)) {
            $errores[] = "La especialidad seleccionada no es válida";
        }
    }

    // Validar fecha
    if (empty($_POST['fecha_cita'])) {
        $errores[] = "La fecha de la cita es obligatoria";
    } else {
        $fecha_cita = $_POST['fecha_cita'];
        $fecha_actual = date('Y-m-d');

        if ($fecha_cita < $fecha_actual) {
            $errores[] = "La fecha de la cita no puede ser en el pasado";
        }
    }

    // Validar hora
    if (empty($_POST['hora_cita'])) {
        $errores[] = "La hora de la cita es obligatoria";
    } else {
        $hora_cita = $_POST['hora_cita'];
    }

    // Guardar en la base de datos
    if (empty($errores)) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO citas (nombre_paciente, especialidad, fecha_cita, hora_cita)
                VALUES (:nombre_paciente, :especialidad, :fecha_cita, :hora_cita)
            ");

            $stmt->bindParam(':nombre_paciente', $nombre_paciente);
            $stmt->bindParam(':especialidad', $especialidad);
            $stmt->bindParam(':fecha_cita', $fecha_cita);
            $stmt->bindParam(':hora_cita', $hora_cita);
            $stmt->execute();

            // Guardar mensaje de éxito en sesión
            $_SESSION['mensaje'] = "Cita registrada correctamente";
            $_SESSION['tipo'] = "success";

            header("Location: index.php");
            exit;

        } catch (PDOException $e) {
            $_SESSION['mensaje'] = "Error al registrar la cita: " . $e->getMessage();
            $_SESSION['tipo'] = "danger";

            header("Location: index.php");
            exit;
        }
    } else {
        // Guardar error en sesión
        $_SESSION['mensaje'] = implode(", ", $errores);
        $_SESSION['tipo'] = "danger";

        header("Location: crear_cita.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
