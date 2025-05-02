<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Contactos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Buscar Contactos</h1>

    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="buscar">
        <label for="q">Buscar por nombre o apellido:</label>
        <input type="text" name="q" id="q" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" required>
        <button type="submit">Buscar</button>
    </form>

    <h2>Resultados de la búsqueda</h2>

    <?php if (isset($contactos) && count($contactos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $contacto): ?>
                    <tr>
                        <td><?= htmlspecialchars($contacto['nombre']) ?></td>
                        <td><?= htmlspecialchars($contacto['apellido']) ?></td>
                        <td><?= htmlspecialchars($contacto['telefono']) ?></td>
                        <td><?= htmlspecialchars($contacto['email']) ?></td>
                        <td>
                            <a href="index.php?action=mostrarFormularioEditar&id=<?= $contacto['id'] ?>">Editar</a>
                            <a href="index.php?action=eliminar&id=<?= $contacto['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este contacto?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($contactos)): ?>
        <p>No se encontraron resultados para la búsqueda.</p>
    <?php endif; ?>

    <p><a href="index.php">Volver a la lista de contactos</a></p>
</body>
</html>
