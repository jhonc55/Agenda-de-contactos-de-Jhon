-- Crear base de datos
CREATE DATABASE IF NOT EXISTS agenda;
USE agenda;

CREATE TABLE IF NOT EXISTS grupos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(150),
    grupo_id INT,
    FOREIGN KEY (grupo_id) REFERENCES grupos(id) ON DELETE SET NULL
);

-- Insertar grupos de ejemplo
INSERT INTO grupos (nombre) VALUES
('Familia'),
('Amigos'),
('Trabajo');

-- Insertar contactos de ejemplo
INSERT INTO contactos (nombre, apellido, telefono, email, grupo_id) VALUES
('Juan', 'Pérez', '70123456', 'juanperez@gmail.com', 1),
('María', 'Gonzales', '76543210', 'maria.gonzales@hotmail.com', 2),
('Carlos', 'López', '71234567', 'carlos.lopez@yahoo.com', 3),
('Ana', 'Martínez', '73333333', 'ana.martinez@example.com', 1),
('Sofía', 'Rodríguez', '74444444', 'sofia.rodriguez@example.com', 4);
