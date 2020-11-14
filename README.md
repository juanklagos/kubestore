
## Kubestore
- Requerimientos:
- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
## Pasos para ejecutar proyecto

- composer install
- Clonar el archivo .env.example con el nombre .env
- Dentro de .env cambiar APP_URL='url donde estara la app'
- Dentro de .env cambiar los datos de la base de datos.
- Ejecutar el comando php artisan key:generate
- Ejecutar el comando para crear las tablas: php artisan migrate
- Ejecutar comando para ver la imagenes: php artisan storage:link


