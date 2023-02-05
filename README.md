## Descripción del proyecto

Hades es un proyecto creado con Laravel que tiene como propósito gestionar un negocio de sneakers. Su estructura consiste en una landingpage para que el usuario conozca el servicio y productos que ofrece la tienda y una parte de administrador, en la cuál, es necesario crear o tener una cuenta para realizar operaciones. Contamos con tres tablas: una de empleados, otra de sneakers y una última de ventas (todas con las operaciones CRUD).

### Relaciones
- Empleados → Ventas: 1:M
- Ventas → Sneakers: N:M (Fundamente de N+1)

Una vez sabiendo esto, es necesario que existan empleados y sneakers para poder crear una venta.

### Restricciones

- Un usuario no puede modificar ni eliminar una venta que no haya sido creada por él.
- De la misma manera, en caso de eliminar alguna venta, ésta se almacenará en una papelera de reciclaje antes de ser eliminada permanentemente para que en caso de que haya una confusión, pueda ser restaurada correctamente. 
- Cada vez que se realice una venta, se le podrá notificar a quien realizó la venta si fue registrada correctamente y se le enviará una notificación vía email.

Esperamos les pueda servir para una mejor comprensión de nuestro proyecto.

## Pasos de instalación software Hades

El software Hades está construido con la tecnología de Laravel, por lo que es indispensable descargar el framework. A continuación, se van a detallar los pasos de una manera clara para ayudarte en el proceso de instalación. 
Favor de seguir cada uno de los pasos, siguiendo un orden cronológico.

### Consideraciones iniciales

- Antes de ir directamente con la instalación, asegúrate de que tengas instalado PHP y Composer instalados. Laravel se basa en PHP y Composer es el administrador de paquetes de ese lenguaje, por lo que serán indispensables.
- Se sugiere descargar un entorno de desarrollo, tales como Laragon o XAMPP, para administrar de una mejor manera el sistema gestor de bases de datos, el servidor web Apache y los intérpretes del lenguaje.
- **Nota:** Sugerimos descargar Laragon, tiene mejor compatibilidad con Laravel que XAMPP.

### Instalación de Laragon

- **Nota:** Se sugiere visualizar este [video](https://youtu.be/RHnuDVlFG-A) para comprender de una mejor manera los siguientes pasos.
  -  Dírigite a la página oficial de [Laragon](https://laragon.org/download/).
  -  Una vez estés navegando por la página web, ubícate en la sección *Download*.
  -  Por último, descarga la versión completa de acuerdo a las características de tu equipo.

### Creación del Proyecto en Laravel

A continuación, se detallan los pasos que se tienen que seguir de acuerdo con la documentación de [Laravel](https://laravel.com/docs/9.x).

- Abre una terminal desde Laragon.
- Clona el proyecto en la carpeta *\www* de Laragon desde nuestro repositorio de GitHub.
- Ejecuta el siguiente comando dentro de la terminal de Laragon. 
  - ***cd [Hades-mantenimeinto]***.
- Instala todos sus componentes con el siguiente comando.
  - ***composer install***.
  - ***composer update*** (sugerido).

### Configuración de credenciales

Laravel necesita credenciales para funcionar, y por lo general, se asignan manualmente en el archivo *.env*. Al clonar desde GitHub estos parámetros no se asignan, pero siguiendo estos pasos se soluciona.

- Ejecuta el siguiente comando para crear otro archivo *.env*. 
  - ***cp .env.example .env***.
- Ejecuta el siguiente comando.
  - ***php artisan key:generate***.

#### Parámetros importantes del archivo .env

El archivo *.env* necesita configurar los parámetros de la base de datos y del servicio de correo con Mailtrap. A continuación, se detallan los pasos para su configuración.

##### Base de Datos

- Ubícate en la sección de los parámetros de la base de datos y asigna en el campo **DB_DATABASE** el nombre que le asignaste a la base de datos para *Hades*.

##### Mailtrap

- Crea una cuenta de [Mailtrap](https://mailtrap.io/register/signup?ref=header) para que tengas acceso a las credenciales de Mailtrap.
- Una vez obteniendo las credenciales, asignalas en cada uno de los parámetros del archivo *.env*.

### Instalación de paquetes y dependencias

- Ejecuta los siguientes comandos, de manera secuencial.
  - ***npm install***.
  - ***npm update*** (sugerido).
 
 ### Migración de las tablas de la base de datos

- Ejecuta el siguiente comando.
  - ***php artisan migrate***.

### Verificación de instalación

- Activa el servidor de artisan con el siguiente comando. 
  - ***php artisan serve***.
- Abre el navegador web para probar que el proyecto responda a la *URL* que te asigna Laravel.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
