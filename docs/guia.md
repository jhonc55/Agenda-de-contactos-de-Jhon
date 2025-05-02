# Guía de Usuario de la Agenda de Contactos

Esta guía proporciona instrucciones sobre cómo preparar la base de datos y utilizar la aplicación de la Agenda de Contactos.

## Estructura del Proyecto

El proyecto de la Agenda de Contactos tiene la siguiente estructura de directorios y archivos:

Agenda-de-Contactos/
├── config/
│   └── conexion.php          # Configuración de la conexión a la base de datos MySQL.
├── controladores/
│   └── contacto_controller.php # Lógica para manejar las acciones relacionadas con los contactos (CRUD).
├── docs/
│   ├── database.sql          # Script SQL para crear la base de datos y las tablas.
│   ├── diagrama.pdf          # Diagrama Entidad-Relación de la base de datos.
│   └── guia.md               # Este archivo de guía de usuario y documentación.
├── models/
│   └── contacto.php          # Clase modelo para interactuar con la tabla contactos en la base de datos.
├── public/
│   └── index.php             # Punto de entrada principal (Front Controller) de la aplicación.
│   └── style.css             # Archivo de estilos CSS para la presentación.
└── views/
├── agregar.php           # Formulario para agregar nuevos contactos.
├── buscar.php            # (Aunque la búsqueda se realiza en listar.php, este archivo podría existir para una vista de resultados dedicada en el futuro).
├── editar.php            # Formulario para editar contactos existentes.
└── listar.php            # Vista para mostrar la lista de contactos y el formulario de búsqueda.


**Descripción de los Directorios y Archivos:**

* **`config/`:** Contiene los archivos de configuración de la aplicación.
    * `conexion.php`: Establece la conexión con la base de datos MySQL.
* **`controladores/`:** Contiene los controladores que manejan la lógica de la aplicación y la interacción entre el modelo y las vistas.
    * `contacto_controller.php`: Controla las acciones relacionadas con los contactos (listar, agregar, editar, eliminar, buscar).
* **`docs/`:** Contiene la documentación y los archivos relacionados con la base de datos.
    * `database.sql`: Script para crear la estructura de la base de datos y los datos de prueba.
    * `diagrama_ER.pdf`: Diagrama que representa la estructura de la base de datos (Modelo Entidad-Relación).
    * `guia.md`: Este archivo, que proporciona la guía de usuario y la documentación del proyecto.
* **`models/`:** Contiene las clases modelo que representan las tablas de la base de datos y encapsulan la lógica de acceso a los datos.
    * `contacto.php`: Modelo para la tabla `contactos`.
* **`public/`:** Es el directorio público de la aplicación, el punto de acceso desde el navegador web.
    * `index.php`: Actúa como el Front Controller, recibiendo todas las peticiones y delegándolas al controlador apropiado.
    * `style.css`: Contiene los estilos CSS para la presentación visual de la aplicación.
* **`views/`:** Contiene los archivos de las vistas, responsables de la presentación de la información al usuario.
    * `agregar.php`: Formulario para añadir nuevos contactos.
    * `buscar.php`: (Podría usarse en el futuro para una vista de resultados de búsqueda dedicada).
    * `editar.php`: Formulario para editar contactos.
    * `listar.php`: Muestra la lista de contactos y el formulario de búsqueda.

## Preparación de la Base de Datos

1.  **Requisitos del Sistema:**
    * Un servidor web local o remoto (por ejemplo, Apache, Nginx).
    * PHP (versión 7.0 o superior).
    * MySQL (o MariaDB).
    * Acceso a la administración de la base de datos (por ejemplo, phpMyAdmin o la línea de comandos de MySQL).

2.  **Importar la Base de Datos:**
    * Navegue hasta la ubicación del archivo `docs/database.sql` dentro del directorio de su proyecto.
    * Utilice una herramienta de administración de MySQL (como phpMyAdmin) o la línea de comandos para importar este archivo a su servidor de base de datos.

        **Ejemplo usando la línea de comandos de MySQL:**
        ```bash
        mysql -u root -p < /ruta/a/su/proyecto/docs/database.sql
        ```
        (Reemplace `/ruta/a/su/proyecto/docs/database.sql` con la ruta real a su archivo y `root` con su nombre de usuario de MySQL. Se le pedirá su contraseña).

    * Esto creará la base de datos `agenda` y las tablas `grupos` y `contactos` con algunos datos de prueba.

## Uso de la Aplicación

1.  **Acceder a la Aplicación:**
    * Abra su navegador web y navegue hasta la URL donde ha alojado la aplicación (por ejemplo, `http://localhost/contactos/public/` si está utilizando un servidor local y su proyecto está en la carpeta `contactos`). El punto de entrada de la aplicación es el archivo `index.php` dentro del directorio `public`.

2.  **Lista de Contactos:**
    * Al acceder a la aplicación, se mostrará una lista de todos los contactos almacenados en la base de datos.
    * Se mostrará el nombre, apellido, teléfono, email y el grupo al que pertenece cada contacto (si tiene uno).
    * En la parte superior, habrá un formulario para buscar contactos por nombre o apellido.
    * También habrá un enlace "+ Agregar nuevo contacto" para ir al formulario de creación de contactos.

3.  **Buscar Contactos:**
    * Ingrese un término de búsqueda (nombre o apellido) en el formulario y haga clic en "Buscar".
    * Se mostrará una lista de los contactos que coincidan con su búsqueda.

4.  **Agregar Nuevo Contacto:**
    * Haga clic en el enlace "+ Agregar nuevo contacto".
    * Se mostrará un formulario donde deberá ingresar el nombre, apellido, teléfono, email y seleccionar un grupo (opcional).
    * Haga clic en el botón "Agregar" para guardar el nuevo contacto. Se le redirigirá a la lista de contactos.

5.  **Editar Contacto:**
    * En la lista de contactos, junto a cada contacto, habrá un enlace "Editar".
    * Haga clic en "Editar" para el contacto que desea modificar.
    * Se mostrará un formulario con los datos del contacto precargados.
    * Modifique los campos que necesite y haga clic en el botón "Actualizar" para guardar los cambios. Se le redirigirá a la lista de contactos.

6.  **Eliminar Contacto:**
    * En la lista de contactos, junto a cada contacto, habrá un enlace "Eliminar".
    * Haga clic en "Eliminar" para el contacto que desea eliminar. Se le pedirá una confirmación antes de proceder con la eliminación.
    * Si confirma, el contacto se eliminará de la base de datos y se le redirigirá a la lista de contactos.

## Diagrama Entidad-Relación

El diagrama que representa la estructura de la base de datos (tablas y sus relaciones) se encuentra en el archivo `docs/diagrama_ER.pdf`.
