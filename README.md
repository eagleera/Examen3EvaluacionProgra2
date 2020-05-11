#Examen Tercer Parcial - Programación web 2

## ¿Como inicializar el proyecto?
Para inicializar el proyecto es necesario hacerlo de la misma manera en que se configura un proyecto de laravel.
Es necesario comporbar los requisitos oficiales de laravel antes de comenzar.

### Clonar el repositorio
```
git clone git@github.com:eagleera/Examen3EvaluacionProgra2.git
```
### Cambiar a la carpeta del repo clonado
```
cd Examen3EvaluacionProgra2
```
### Instalar todas las dependencias con composer
```
composer install
```
### Correr un comando para inicializar la app con datos dummy
Este comando tambien corre los migrations y los seeder por lo que no es necesario correrlos por aparte. 
(Es necesario indicar la conexión a la base de datos en el .env antes de correr el comando)
```
php artisan init:app
```
### Prender el server local
```
php artisan serve
```