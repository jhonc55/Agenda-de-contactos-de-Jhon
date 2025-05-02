<?php

// Punto de entrada único para la aplicación

// Incluir la configuración de la base de datos (si aún no se ha hecho en el controlador)
require_once __DIR__ . '/../config/conexion.php';

// Obtener la acción solicitada de la URL
$action = $_GET['action'] ?? 'listar'; // Acción por defecto

// Incluir el controlador de contactos
require_once __DIR__ . '/../controladores/contacto_controller.php';

// Instanciar el controlador de contactos
$controller = new ContactoController();

// Ejecutar la acción basada en el parámetro 'action'
switch ($action) {
    case 'listar':
        $controller->listar();
        break;
    case 'buscar':
        $controller->buscar($_GET['q'] ?? '');
        break;
    case 'mostrarFormularioAgregar':
        $controller->mostrarFormularioAgregar();
        break;
    case 'agregar':
        $controller->agregar($_POST);
        break;
    case 'mostrarFormularioEditar':
        $controller->mostrarFormularioEditar($_GET['id'] ?? null);
        break;
    case 'editar':
        $controller->editar($_POST);
        break;
    case 'eliminar':
        $controller->eliminar($_GET['id'] ?? null);
        break;
    default:
        // Manejar acciones no válidas (mostrar error o redirigir)
        echo "Acción no válida.";
        break;
}

?>