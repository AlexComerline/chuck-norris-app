# Chuck Norris Joke App

Este es un proyecto en PHP que consume la API de [Chuck Norris](https://api.chucknorris.io) para mostrar frases aleatorias categorizadas. El proyecto utiliza programación orientada a objetos y Sass para los estilos.

## Estructura del proyecto

chucknorris/
├── composer.json
├── phpunit.xml
├── src/
│   ├── Api.php
│   └── JokeManager.php
├── tests/
│   ├── ApiTest.php
│   └── JokeManagerTest.php
├── js/
│   └── script.js
├── scss/
│   └── style.scss
├── style.css
├── index.php
└── README.md


## Requisitos de despliegue
- PHP >= 7.4 con cURL y sesiones habilitadas  
- Apache (XAMPP) con VirtualHost configurado para `chucknorris.test`  
- Node.js + Sass  
- Composer  

## Instalación
1. Clona en `C:/xampp/htdocs/chucknorris`  
2. Añade en tu hosts:  
127.0.0.1 chucknorris.test
3. Configura VirtualHost apuntando a esa carpeta  
4. Desde VS Code ejecuta:  
composer install
5. Compila Sass:  
sass scss/style.scss style.css --watch
6. Reinicia Apache  

## Ejecutar tests
vendor\bin\phpunit
Abre http://chucknorris.test, selecciona categoría, obtén y resetea frases.

Con esto ya tienes **el proyecto completo** y listo para desplegar, testear y revisar. ¡Éxito!