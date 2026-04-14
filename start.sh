#!/bin/bash

# Crear carpeta de database si no existe
mkdir -p /var/www/html/database

# Cambiar permisos para que PHP pueda escribir
chmod 775 /var/www/html/database

# Limpiar cache de PHP
rm -rf /var/www/html/cache/*

# Ejecutar init.php si la BD no existe
if [ ! -f /var/www/html/database/database.sqlite ]; then
    echo "Inicializando base de datos..."
    cd /var/www/html
    php database/init.php
    echo "Base de datos creada exitosamente"
fi

# Iniciar PHP-FPM y Nginx
php-fpm -D
nginx -g 'daemon off;'
