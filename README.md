# Chuck Norris Joke App

Este es un proyecto en PHP que consume la API de [Chuck Norris](https://api.chucknorris.io) para mostrar frases aleatorias categorizadas. El proyecto utiliza programación orientada a objetos y Sass para los estilos.

## Estructura del proyecto

chucknorris/
├── index.php
├── src/
│ ├── Api.php
│ └── JokeManager.php
├── js/
│ └── script.js
├── scss/
│ └── style.scss
├── style.css (generado desde Sass)
├── README.md

## Requisitos

- PHP 7.4 o superior
- Apache o servidor compatible
- Node.js + Sass (para compilar los estilos)

## FUNCIONAMIENTO
Selecciona una categoría y haz clic en “Obtener frase”.

Las frases se mantendrán tras recargar la página.

Usa “Eliminar frases” para limpiar la sesión.

## Tecnologías utilizadas

PHP (OOP)
Sass (CSS compilado)
JavaScript
API REST (Chuck Norris)
