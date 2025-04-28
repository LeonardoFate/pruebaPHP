FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activar mod_rewrite para URLs amigables
RUN a2enmod rewrite

# Definir carpeta de trabajo (opcional)
WORKDIR /var/www/html
