<?php
session_start();

// Procesar botón para borrar preferencias
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])) {
    if (isset($_SESSION['idioma']) || isset($_SESSION['perfil']) || isset($_SESSION['zona_horaria'])) {
        session_unset(); // Eliminar valores de la sesión
        $mensaje = "Preferencias borradas.";
    } else {
        $mensaje = "Debes fijar primero las preferencias.";
    }
}

// Recuperar valores de la sesión o establecer como "No establecido"
$idioma = $_SESSION['idioma'] ?? "No establecido";
$perfil = $_SESSION['perfil'] ?? "No establecido";
$zona_horaria = $_SESSION['zona_horaria'] ?? "No establecido";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Preferencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="p-3">
    <div class="container">
        <h1 class="text-success"><i class="fas fa-list"></i> Preferencias</h1>

        <!-- Mostrar mensaje de estado -->
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-info"><?= $mensaje ?></div>
        <?php endif; ?>

        <!-- Mostrar valores de las preferencias -->
        <div class="card p-3 mt-3">
            <p><strong>Idioma:</strong> <?= $idioma ?></p>
            <p><strong>Perfil Público:</strong> <?= $perfil ?></p>
            <p><strong>Zona Horaria:</strong> <?= $zona_horaria ?></p>
        </div>

        <!-- Botones para borrar o establecer preferencias -->
        <form method="post" class="mt-3">
            <button type="submit" name="borrar" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
            <a href="preferencias.php" class="btn btn-primary"><i class="fas fa-undo"></i> Establecer</a>
        </form>
    </div>
</body>
</html>
