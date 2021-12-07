## Instalacion

Clonar el repositorio

    git clone https://github.com/lepfsd/prueba-tec.git

Cambie a la carpeta 

    cd prueba-tec

Instale todas las dependencias usando composer

    composer install


Copie el archivo env de ejemplo y realice los cambios de configuración necesarios en el archivo .env

    cp .env.example .env

Generar una nueva application key

    php artisan key:generate

Instale el laravel ui

    composer require laravel/ui "^1.2"

Instale el cross 

    npm install --global cross-env

Generar el auth

    php artisan ui bootstrap --auth 

Instale las dependencias npm

    npm install && npm run dev

Ejecute las migraciones de la base de datos (** Establezca la conexión de la base de datos en .env antes de migrar **)

    php artisan migrate

Ejecute los seeders en el orden listado

    php artisan db:seed --class=CreateUsersSeeder 
    php artisan db:seed

Inicie el servidor de desarrollo local

    php artisan serve

Ahora puede acceder al servidor en http://localhost:8000

Usuario admin

    luisp@devups.io foobar1

Usuario regular

    use2r@user.com foobar1






