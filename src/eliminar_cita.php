<?php
require_once 'config/database.php';

// Verificar que se haya proporcionado un ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {

        $stmt = $pdo->prepare("DELETE FROM citas WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Verificar si se eliminó algún registro
        if ($stmt->rowCount() > 0) {
            header("Location: index.php?mensaje=Cita eliminada correctamente&tipo=success");
        } else {
            header("Location: index.php?mensaje=No se encontró la cita con ID: $id&tipo=warning");
        }
    } catch (PDOException $e) {
        header("Location: index.php?mensaje=Error al eliminar la cita: " . $e->getMessage() . "&tipo=danger");
    }
} else {
    header("Location: index.php?mensaje=ID de cita no válido&tipo=danger");
}

exit;
