## API Restful para gestionar activos fijos
API RestFul para gestionar un sistema de activos, permite crear activo, consultar informacion de activo fijo por persona, area de trabajo y activos, asignar un activo, eliminar una asignacion de activo basado en laravel 10.*

## Requerimientos
* PHP>=8.1
* MySQL>=8.0.36
* Laravel 10.*
* Composer 

## Descargar proyecto para modo de desarrollo
* clone to project
'''
https://github.com/EdwinAlexanderBernardinoMoran/fixedassets.git
'''

## Instalación de dependencias
```
composer update
```

## Generar script de base de datos.

* Crear base de datos con el nombre de
```
activo_fijo
```
* Importar el script que viene abjunto en el proyecto que se llama
```
activo_fijo.sql
```

## Generar clave para laravel.

* Acceder al directorio del proyecto
```
cd fixedassets/
```
* configurar las variables de entorno en el archivo .env
```
cambiar el nombre .env.example a .env
```

* Configurar credenciales para conectar a la base de datos MySQL
```
DB_CONNECTION=mysql
```
```
DB_HOST=127.0.0.1
```
```
DB_PORT=3306
```
```
DB_DATABASE=activo_fijo
```
```
DB_USERNAME=root
```
```
DB_PASSWORD=
```
* generating key

```
php artisan key:generate
```

## Detalles de cada enpoint.

* server http://127.0.0.1:8000

```
GET /api​/v1/tiposactivos Muestra todos los tipos de activos
```
```
POST ​/api​/v1/tiposactivos Almacena nuevos tipos de activos
```
```
GET ​/api​/v1/tiposactivos/{tiposactivo} Muestra un tipo de activo por identificacion
```
```
PUT ​/api​/v1/tiposactivos/{tiposactivo} Actualiza un tipo de activo por identificacion
```
```
DELETE ​/api​/v1/tiposactivos/{tiposactivo} Elimina un tipo de activo
```


* Detalles del enpoint areatrabajos

```
GET /api​/v1/areatrabajos Muestra todas las areas de trabajo
```
```
POST ​/api​/v1/areatrabajos Almacena nuevas areas de trabajo
```
```
GET ​/api​/v1/areatrabajos/{areatrabajo} Muestra un area de trabajo por identificacion
```
```
PUT ​/api​/v1/areatrabajos/{areatrabajo} Actualiza un area de trabajo por identificacion
```
```
DELETE ​/api​/v1/areatrabajos/{areatrabajo} Elimina un area de trabajo
```



* Detalles del enpoint activos fijos

```
GET /api​/v1/activosfijos Muestra todas los activos fijos
```
```
POST ​/api​/v1/activosfijos Almacena nuevas activos fijos activosfijos/codigo el filtro recibe el siguiente campo: codigo
```
```
POST ​/api​/v1/activosfijos/codigo filtro
```
```
GET ​/api​/v1/activosfijos/{activosfijo} Muestra un activo fijo por identificacion
```
```
PUT ​/api​/v1/activosfijos/{activosfijo} Actualiza un activo fijo por identificacion
```
```
DELETE ​/api​/v1/activosfijos/{activosfijo} Elimina un activo fijo
```


* Detalles del enpoint asignaciones

```
GET /api​/v1/asignaciones Muestra todas los asignaciones
```
```
POST ​/api​/v1/asignaciones Almacena nuevas asignaciones
```
* filtro consulta información de las asignaciones de los activos por
persona, area de trabajo y activos.

```
POST ​/api​/v1/asignaciones/consultinformation envia los siguientes campos: personas, areatrabajo, activos, si no envias nada, por defecto devuelve toda la lista de asignaciones.
```
```
GET ​/api​/v1/asignaciones/{asignacione} Muestra una asignacion por identificacion
```
```
PUT ​/api​/v1/asignaciones/{asignacione} Actualiza una asignacion por identificacion
```
```
DELETE ​/api​/v1/asignaciones/{asignacione} Elimina una asignacion
```


* Detalles del enpoint personas

```
GET /api​/v1/personas Muestra todas los personas
```
```
POST ​/api​/v1/personas Almacena nuevas personas
```
```
GET ​/api​/v1/personas/{persona} Muestra una persona por identificacion
```
```
PUT ​/api​/v1/personas/{persona} Actualiza una persona por identificacion
```
```
DELETE ​/api​/v1/personas/{persona} Elimina una persona
```


* Detalles del enpoint historial_asignaciones

```
GET /api​/v1/historialasignacion Muestra todas los historial de asignacion
```
```
GET ​/api​/v1/historialasignacion/{historial} Muestra una historial de asignacion por identificacion
```


