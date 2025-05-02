<?php
require_once __DIR__ . '/../config/conexion.php'; // Ajusta si tu ruta es diferente

class Contacto {

    // Obtener todos los contactos con su grupo
    public static function getAllConGrupo() {
        $db = Conexion::conectar();
        $stmt = $db->query("
            SELECT c.*, g.nombre AS grupo 
            FROM contactos c 
            LEFT JOIN grupos g ON c.grupo_id = g.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un solo contacto por ID
    public static function getById($id) {
        $db = Conexion::conectar();
        $stmt = $db->prepare("SELECT * FROM contactos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo contacto
    public static function insert($nombre, $apellido, $telefono, $email, $grupo_id) {
        $db = Conexion::conectar();
        $stmt = $db->prepare("
            INSERT INTO contactos (nombre, apellido, telefono, email, grupo_id)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$nombre, $apellido, $telefono, $email, $grupo_id]);
    }

    // Actualizar un contacto existente
    public static function update($id, $nombre, $apellido, $telefono, $email, $grupo_id) {
        $db = Conexion::conectar();
        $stmt = $db->prepare("
            UPDATE contactos SET nombre = ?, apellido = ?, telefono = ?, email = ?, grupo_id = ?
            WHERE id = ?
        ");
        $stmt->execute([$nombre, $apellido, $telefono, $email, $grupo_id, $id]);
    }

    // Eliminar un contacto
    public static function delete($id) {
        $db = Conexion::conectar();
        $stmt = $db->prepare("DELETE FROM contactos WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Buscar contactos por nombre o apellido (con grupo)
    public static function buscarConGrupo($termino) {
        $db = Conexion::conectar();
        $stmt = $db->prepare("
            SELECT c.*, g.nombre AS grupo 
            FROM contactos c
            LEFT JOIN grupos g ON c.grupo_id = g.id
            WHERE c.nombre LIKE ? OR c.apellido LIKE ?
        ");
        $like = "%$termino%";
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los grupos (para usar en formularios)
    public static function getGrupos() {
        $db = Conexion::conectar();
        $stmt = $db->query("SELECT * FROM grupos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
