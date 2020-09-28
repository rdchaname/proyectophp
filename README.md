# Diplomado de PHP - Ceti Chiclayo

Paso 01: Instalar dependencias con composer

```
composer install 
```

Paso 02: Crear archivo .env (copiar de archivo .env.example)

Paso 03: Completar con los datos de conexión a base de datos

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Paso 04: Generate APP_KEY

```
php artisan key:generate
```

Paso 05: Migrar base de datos:
```
php artisan migrate
```