# Sistema de Gestión de Citas Médicas

Este proyecto es una solución desarrollada para la prueba técnica, utilizando **PHP puro**, **MySQL**, **Bootstrap 5**, y **Docker** para la virtualización de servicios.

## Funcionalidades principales

- Registrar nueva cita médica (paciente, especialidad, fecha, hora)
- Validaciones tanto del lado del cliente (HTML5 + JavaScript) como del servidor (PHP)
- Listado de citas en una tabla ordenada y responsiva
- Eliminar citas existentes desde el listado
- Alertas de éxito o error que se cierran automáticamente después de 3 segundos
- Consultas seguras utilizando **PDO** y **consultas preparadas** (protección contra SQL Injection)

## Tecnologías utilizadas

- PHP 8.2
- MySQL 5.7
- Bootstrap 5.3 + Bootstrap Icons
- Docker + Docker Compose

## Instalación y ejecución

1. Clonar el repositorio:
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd proyecto-citas-medicas
   ```

2. Crear el archivo `.env` en la raíz con el siguiente contenido:
   ```
   DB_HOST=db
   DB_NAME=citasdb
   DB_USER=user
   DB_PASS=password
   DB_ROOT_PASS=rootpassword
   ```

3. Levantar los contenedores:
   ```bash
   docker-compose up --build
   ```

4. Acceder a la aplicación:
   - Abrir [http://localhost:8080](http://localhost:8080) en el navegador

## 🗄️ Base de datos

   - En el repositorio se encuentra una carpeta llamada sql donde se encuentra script para generar la tabla

## 📑 Notas

- Todas las operaciones sobre la base de datos utilizan consultas preparadas para garantizar la seguridad
- La validación del formulario es doble: cliente (HTML5) y servidor (PHP)
- El sistema utiliza sesiones para mostrar mensajes de éxito o error y mantener la URL limpia
