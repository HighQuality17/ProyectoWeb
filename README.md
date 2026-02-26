Autores:
Joni Alexander Cuartas Pineda,
Veronica Rendon Florez

Contribuidores:
Juan Valderrama

GUÍA DE INSTALACIÓN Y CONFIGURACIÓN DEL SOFTWARE

Para la ejecución y despliegue del programa de computador en un entorno de desarrollo o pruebas, se deben seguir los siguientes pasos técnicos:

1. Requisitos del Sistema
   
•	Servidor Web: Apache 2.4+ o Nginx.

•	Lenguaje: PHP 8.1 o superior (con extensiones: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML).

•	Gestor de Dependencias: Composer 2.x.

•	Base de Datos: MySQL 5.7+ o MariaDB 10.4+.

•	Entorno de Ejecución Frontend: Node.js y NPM (para la compilación de assets CSS/JS).


3. Procedimiento de Instalación
   
•	Descompresión y Dependencias: Extraer el código fuente y ejecutar el comando composer install desde la terminal en el directorio raíz para instalar las librerías del framework.

•	Configuración de Entorno: Duplicar el archivo .env.example y renombrarlo como .env. Configurar en este archivo las credenciales de la base de datos MySQL (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

•	Generación de Clave de Seguridad: Ejecutar el comando php artisan key:generate para establecer la clave de cifrado de la aplicación.

•	Migración de Estructura de Datos: Ejecutar php artisan migrate para crear las tablas, índices y relaciones en la base de datos (incluyendo las tablas de roles, productos y sesiones).

•	Compilación de Interfaz: Ejecutar npm install seguido de npm run build para procesar los archivos de la plantilla (CSS/JS) y los scripts de Realidad Aumentada.

•	Servidor de Pruebas: Iniciar el servicio mediante el comando php artisan serve, lo cual habilitará el acceso a la plataforma a través de la dirección local http://127.0.0.1:8000.

