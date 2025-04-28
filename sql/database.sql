CREATE TABLE IF NOT EXISTS citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_paciente VARCHAR(100) NOT NULL,
    especialidad ENUM('Medicina General', 'Pediatría', 'Dermatología') NOT NULL,
    fecha_cita DATE NOT NULL,
    hora_cita TIME NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO citas (nombre_paciente, especialidad, fecha_cita, hora_cita) VALUES
('Juan Pérez', 'Medicina General', CURDATE() + INTERVAL 1 DAY, '10:00:00'),
('María García', 'Pediatría', CURDATE() + INTERVAL 2 DAY, '11:30:00'),
('Carlos López', 'Dermatología', CURDATE() + INTERVAL 3 DAY, '09:15:00');
