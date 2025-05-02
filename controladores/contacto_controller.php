<?php

require_once __DIR__ . '/../models/Contacto.php';

class ContactoController {

    public function listar() {
        $contactos = Contacto::getAllConGrupo(); // Asumo que tienes o crearás este método en el modelo
        require_once __DIR__ . '/../views/listar.php';
    }

    public function buscar($termino) {
        $contactos = Contacto::buscarConGrupo($termino); // Asumo que tienes o crearás este método en el modelo
        require_once __DIR__ . '/../views/listar.php';
    }

    public function mostrarFormularioAgregar() {
        $grupos = Contacto::getGrupos();
        require_once __DIR__ . '/../views/agregar.php';
    }

    public function agregar($postData) {
        if (!empty($postData)) {
            $nombre = trim($postData['nombre'] ?? '');
            $apellido = trim($postData['apellido'] ?? '');
            $telefono = trim($postData['telefono'] ?? '');
            $email = trim($postData['email'] ?? '');
            $grupo_id = $postData['grupo_id'] ?? null;
    
            $errores = [];
    
            if (empty($nombre)) {
                $errores['nombre'] = "El nombre es obligatorio.";
            } elseif (strlen($nombre) > 100) {
                $errores['nombre'] = "El nombre no debe exceder los 100 caracteres.";
            }
    
            if (empty($apellido)) {
                $errores['apellido'] = "El apellido es obligatorio.";
            } elseif (strlen($apellido) > 100) {
                $errores['apellido'] = "El apellido no debe exceder los 100 caracteres.";
            }
    
            if (empty($telefono)) {
                $errores['telefono'] = "El teléfono es obligatorio.";
            } elseif (!preg_match('/^[0-9+\-() ]+$/', $telefono)) {
                $errores['telefono'] = "Formato de teléfono no válido.";
            } elseif (strlen($telefono) > 20) {
                $errores['telefono'] = "El teléfono no debe exceder los 20 caracteres.";
            }
    
            if (empty($email)) {
                $errores['email'] = "El email es obligatorio.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "El formato del email no es válido.";
            } elseif (strlen($email) > 150) {
                $errores['email'] = "El email no debe exceder los 150 caracteres.";
            }

        
            if (empty($errores)) {
                Contacto::insert($nombre, $apellido, $telefono, $email, $grupo_id);
                $_SESSION['mensaje_exito'] = "Contacto agregado correctamente.";
                header('Location: ../public/index.php');
                exit;
            } else {
                $grupos = Contacto::getGrupos();
                require_once __DIR__ . '/../views/agregar.php';
            }
        }
    }

    public function mostrarFormularioEditar($id) {
        if ($id) {
            $contacto = Contacto::getById($id);
            $grupos = Contacto::getGrupos();
            require_once __DIR__ . '/../views/editar.php';
        }
    }

    public function editar($postData) {
        $id = $postData['id'] ?? null;
        if ($id) {
            $nombre = trim($postData['nombre'] ?? '');
            $apellido = trim($postData['apellido'] ?? '');
            $telefono = trim($postData['telefono'] ?? '');
            $email = trim($postData['email'] ?? '');
            $grupo_id = $postData['grupo_id'] ?? null;
    
            $errores = [];
    
            if (empty($nombre)) {
                $errores['nombre'] = "El nombre es obligatorio.";
            } elseif (strlen($nombre) > 100) {
                $errores['nombre'] = "El nombre no debe exceder los 100 caracteres.";
            }
    
            if (empty($apellido)) {
                $errores['apellido'] = "El apellido es obligatorio.";
            } elseif (strlen($apellido) > 100) {
                $errores['apellido'] = "El apellido no debe exceder los 100 caracteres.";
            }
    
            if (empty($telefono)) {
                $errores['telefono'] = "El teléfono es obligatorio.";
            } elseif (!preg_match('/^[0-9+\-() ]+$/', $telefono)) {
                $errores['telefono'] = "Formato de teléfono no válido.";
            } elseif (strlen($telefono) > 20) {
                $errores['telefono'] = "El teléfono no debe exceder los 20 caracteres.";
            }
    
            if (empty($email)) {
                $errores['email'] = "El email es obligatorio.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "El formato del email no es válido.";
            } elseif (strlen($email) > 150) {
                $errores['email'] = "El email no debe exceder los 150 caracteres.";
            }
    
            if (empty($errores)) {
                Contacto::update($id, $nombre, $apellido, $telefono, $email, $grupo_id);
                $_SESSION['mensaje_exito'] = "Contacto actualizado correctamente.";
                header('Location: index.php');
                exit;
            } else {
                $contacto = Contacto::getById($id);
                $grupos = Contacto::getGrupos();
                require_once __DIR__ . '/../views/editar.php';
            }
        }
    }

    public function eliminar($id) {
        if ($id) {
            Contacto::delete($id);
            header('Location: index.php');
            exit;
        }
    }
}

?>