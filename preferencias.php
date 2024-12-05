<?php
session_start();

// Procesar formulario y almacenar preferencias en la sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['idioma'] = $_POST['idioma'];
    $_SESSION['perfil'] = $_POST['perfil'];
    $_SESSION['zona_horaria'] = $_POST['zona_horaria'];
    $mensaje = "Preferencias de usuario guardadas";
} else {
    $mensaje = isset($_SESSION['idioma']) ? "Preferencias de usuario guardadas" : "";
}

// Recuperar valores de la sesión para mostrarlos como seleccionados por defecto
$idioma = $_SESSION['idioma'] ?? "";
$perfil = $_SESSION['perfil'] ?? "";
$zona_horaria = $_SESSION['zona_horaria'] ?? "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="p-3">
    <div class="container">
        <h1 class="text-primary"><i class="fas fa-cogs"></i> Preferencias</h1>

        <!-- Mostrar mensaje de estado -->
        <?php if ($mensaje): ?>
            <div class="alert alert-success"><?= $mensaje ?></div>
        <?php endif; ?>

        <!-- Formulario para establecer preferencias -->
        <form method="post" class="mt-4">
            <div class="mb-3">
                <label for="idioma" class="form-label">Idioma</label>
                <select name="idioma" id="idioma" class="form-select">
                    <option value="Inglés" <?= $idioma === "Inglés" ? "selected" : "" ?>>Inglés</option>
                    <option value="Español" <?= $idioma === "Español" ? "selected" : "" ?>>Español</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="perfil" class="form-label">Perfil Público</label>
                <select name="perfil" id="perfil" class="form-select">
                    <option value="Sí" <?= $perfil === "Sí" ? "selected" : "" ?>>Sí</option>
                    <option value="No" <?= $perfil === "No" ? "selected" : "" ?>>No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="zona_horaria" class="form-label">Zona Horaria</label>
                <select name="zona_horaria" id="zona_horaria" class="form-select">
                    <option value="GMT-2" <?= $zona_horaria === "GMT-2" ? "selected" : "" ?>>GMT-2</option>
                    <option value="GMT-1" <?= $zona_horaria === "GMT-1" ? "selected" : "" ?>>GMT-1</option>
                    <option value="GMT" <?= $zona_horaria === "GMT" ? "selected" : "" ?>>GMT</option>
                    <option value="GMT+1" <?= $zona_horaria === "GMT+1" ? "selected" : "" ?>>GMT+1</option>
                    <option value="GMT+2" <?= $zona_horaria === "GMT+2" ? "selected" : "" ?>>GMT+2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Establecer preferencias</button>
        </form>
        
        <!-- Enlace para mostrar preferencias -->
        <a href="mostrar.php" class="btn btn-link mt-3"><i class="fas fa-eye"></i> Mostrar preferencias</a>
    </div>
</body>
</html>
