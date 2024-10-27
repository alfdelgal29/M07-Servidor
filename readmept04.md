##  Proyecto ----> Pràctica 04 - Inici d'usuaris i registre de sessions


## Tecnologías Utilizadas

*PHP: Como lenguaje principal para la lógica del servidor.*

*MySQL: Para almacenar todos los datos del usuario y los artículos.*

*HTML/CSS: Para el diseño de la interfaz de usuario, incluyendo estils.css que define el estilo de toda la aplicación.*

## Que cambiaria de mi practica alguna mejora que otra:
**Mensajes**: Implementar mensajes de error y confirmación claros en todas las acciones, como inicio de sesión, registro y edición de artículos.

**JavaScript**: Implementaria el JS para la mejora del rendimiento de nuestro servidor al cargarlo menos seria una muy buena opción.


## Estructura

PLANTILLA/
|
├── Estilo/
│   └── estils.css
|
├── Controladores/
│   ├── controlador.php
│   ├── insertar.php
│   ├── login.php
│   ├── logout.php
│   ├── modificar.php
│   ├── session.php
│   ├── signup.php
|   └── index.php
├── Modelos/
│   ├── ModeloBD.php
│   └── ModeloUsuarios.php
|
├── Vistas/
│   ├── index.vista.php
│   ├── login.view.php
│   ├── navbar.view.php
│   └── signup.view.php
|
|
└── readmept04.md