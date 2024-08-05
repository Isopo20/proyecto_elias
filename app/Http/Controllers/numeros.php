<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Diferencias numerica de 15</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Escriba un número: <input type="number" name="numero" step="any" required>
        <br><br>
        <input type="submit" value="Calcular Diferencia">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_FLOAT);

        if ($numero === false) {
            $error = "Error: El valor introducido no es un número válido.";
        } else {
            $resultado = calcularDiferencia($numero);
        }
    }

    function calcularDiferencia($num) {
        if ($num < 0 || $num == 15) {
            return "Error: El número no puede ser negativo o igual a 15.";
        } else {
            return 15 - $num;
        }
    }
    ?>
    <?php if (isset($error)): ?>
        <h2><?php echo htmlspecialchars($error); ?></h2>
    <?php elseif (isset($resultado)): ?>
        <h1>Resultado: <?php echo htmlspecialchars($resultado); ?></h1>
    <?php endif; ?>
</body>
</html>
