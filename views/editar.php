<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Contacto</h1>

    <form method="POST" action="index.php?action=editar">
        <input type="hidden" name="id" value="<?= $contacto['id'] ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($contacto['nombre']) ?>" required>
        <?php if (isset($errores['nombre'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['nombre']) ?></p>
        <?php endif; ?>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?= htmlspecialchars($contacto['apellido']) ?>" required>
        <?php if (isset($errores['apellido'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['apellido']) ?></p>
        <?php endif; ?>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($contacto['telefono']) ?>" required>
        <?php if (isset($errores['telefono'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['telefono']) ?></p>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($contacto['email']) ?>" required>
        <?php if (isset($errores['email'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['email']) ?></p>
        <?php endif; ?>

        <label for="grupo_id">Grupo:</label>
        <select name="grupo_id" id="grupo_id">
            <option value="">Seleccionar grupo</option>
            <?php foreach ($grupos as $grupo): ?>
                <option value="<?= $grupo['id'] ?>" <?= $contacto['grupo_id'] == $grupo['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($grupo['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <button type="submit">Actualizar</button>
    </form>

    <p><a href="index.php">Volver a la lista de contactos</a></p>
</body>
</html>
