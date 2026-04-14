# Biblioteca Digital - PHP

Aplicación web para gestionar libros, autores y editoriales usando PHP y SQLite.

## Requisitos Locales

- PHP 8.2+
- Composer
- SQLite3

## Instalación Local

```bash
composer install
php database/init.php
php -S localhost:8000 -t public
```

Luego accede a `http://localhost:8000`

## Deployment en Railway

### 1. Conectar Repositorio

1. Ve a [Railway.app](https://railway.app)
2. Crea un nuevo proyecto
3. Selecciona "Deploy from GitHub"
4. Conecta tu repositorio

### 2. Variables de Entorno

No se necesitan variables adicionales. Railway usará automáticamente el Dockerfile.

### 3. Puerto

La aplicación escucha en el puerto `8080` por defecto.

### 4. Base de Datos

SQLite se almacena en `/var/www/html/database/database.sqlite`. Railway mantiene los archivos persistentes automáticamente.

## Estructura del Proyecto

```
├── app/
│   ├── Router.php
│   ├── Controllers/
│   └── Support/
├── database/
│   ├── Database.php
│   ├── database.sqlite
│   └── init.php
├── public/
│   ├── index.php
│   └── css/
├── resources/
│   └── views/
├── Dockerfile
├── nginx.conf
├── start.sh
└── railway.json
```

## Características

- ✅ CRUD para Libros, Autores y Editoriales
- ✅ Base de datos SQLite
- ✅ Formularios con Skeleton CSS
- ✅ Router personalizado
- ✅ Sin dependencias externas

## Notas

- La base de datos se inicializa automáticamente en Railway
- Los datos persisten entre despliegues
- La aplicación usa Nginx + PHP-FPM para mejor rendimiento

