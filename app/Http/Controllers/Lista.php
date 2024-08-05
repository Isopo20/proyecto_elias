<?php
$paises = ["Mexico", "Chile", "El Salvador", "Brazil", "Colombia", "Perú", "Argentina", "Suiza", "Rusia"];
$paisSeleccionado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paisSeleccionado = htmlspecialchars($_POST["pais"]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Desplegable</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="pais">Seleccione un país:</label>
        <select name="pais" id="pais">
            <?php foreach ($paises as $pais): ?>
                <option value="<?php echo htmlspecialchars($pais); ?>" <?php echo ($pais == $paisSeleccionado) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($pais); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php if ($paisSeleccionado): ?>
        <h2>País seleccionado: <?php echo htmlspecialchars($paisSeleccionado); ?></h2>
    <?php endif; ?>
</body>
</html>
