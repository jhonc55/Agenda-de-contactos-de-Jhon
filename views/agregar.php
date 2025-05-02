<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <h1>Agregar Nuevo Contacto</h1>

    <form method="POST" action="index.php?action=agregar">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <?php if (isset($errores['nombre'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['nombre']) ?></p>
        <?php endif; ?>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <?php if (isset($errores['apellido'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['apellido']) ?></p>
        <?php endif; ?>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>
        <?php if (isset($errores['telefono'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['telefono']) ?></p>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <?php if (isset($errores['email'])): ?>
        <p class="error-mensaje"><?= htmlspecialchars($errores['email']) ?></p>
        <?php endif; ?>

        <label for="grupo_id">Grupo:</label>
        <select name="grupo_id" id="grupo_id" required>
            <option value="">Seleccionar grupo</option>
            <?php foreach ($grupos as $grupo): ?>
                <option value="<?= $grupo['id'] ?>"><?= htmlspecialchars($grupo['nombre']) ?></option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($error)): ?>
            <p class="error-mensaje"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <button type="submit">Agregar</button>
    </form>

    <p><a href="index.php">Volver a la lista de contactos</a></p>
</body>
</html>
