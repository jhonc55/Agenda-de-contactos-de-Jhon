<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Contactos</h1>

    <?php if (isset($_SESSION['mensaje_exito'])): ?>
        <p class="mensaje exito"><?= htmlspecialchars($_SESSION['mensaje_exito']) ?></p>
        <?php unset($_SESSION['mensaje_exito']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['mensaje_error'])): ?>
        <p class="mensaje error"><?= htmlspecialchars($_SESSION['mensaje_error']) ?></p>
        <?php unset($_SESSION['mensaje_error']); ?>
    <?php endif; ?>

    <form method="GET" action="index.php">
        <input type="hidden" name="action" value="buscar">
        <input type="text" name="q" placeholder="Buscar por nombre o apellido" required>
        <button type="submit">Buscar</button>
    </form>

    <p><a href="index.php?action=mostrarFormularioAgregar">+ Agregar nuevo contacto</a></p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Grupo</th>
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
                    <td><?= htmlspecialchars($contacto['grupo'] ?? 'Sin grupo') ?></td>
                    <td>
                        <a href="index.php?action=mostrarFormularioEditar&id=<?= $contacto['id'] ?>">Editar</a> |
                        <a href="index.php?action=eliminar&id=<?= $contacto['id'] ?>" onclick="return confirm('¿Eliminar contacto?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
