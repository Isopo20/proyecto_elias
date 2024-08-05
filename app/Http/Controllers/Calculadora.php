<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            background-color: beige; 
            color: #333; 
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        form {
            background-color:blanchedalmond;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        input[type="number"] {
            padding: 10px;
            border-radius: 10px; 
            border: 1px solid ; 
            margin-bottom: 15px;
            width: 100%; 
            box-sizing: border-box; 
        }
        
        h1{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: grey;

        }
        input[type="submit"] {
            background-color: burlywood;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px; 
            cursor: pointer;
            font-size: 1em;
            margin-right: 5px; 
        }
        
        .resultado {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body style="background-color:antiquewhite ";>
    <h1>Calculadora</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" step="any" required>
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" step="any" required>
        <label>Operación:</label>
        <input type="submit" name="operacion" value="Suma">
        <input type="submit" name="operacion" value="Resta">
        <input type="submit" name="operacion" value="Multiplicación">
        <input type="submit" name="operacion" value="División">
    </form>
    
    <?php
    function calcular($num1, $num2, $operacion) {
        switch ($operacion) {
            case "Suma":
                return $num1 + $num2;
            case "Resta":
                return $num1 - $num2;
            case "Multiplicación":
                return $num1 * $num2;
            case "División":
                return $num2 != 0 ? $num1 / $num2 : "Error: División por cero.";
            default:
                return "Operación no válida.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
        $numero2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
        $operacion = filter_input(INPUT_POST, 'operacion', FILTER_SANITIZE_STRING);

        if ($numero1 === false || $numero2 === false) {
            $error = "Error: Los valores introducidos deben ser números válidos.";
        } else {
            $resultado = calcular($numero1, $numero2, $operacion);
        }
    }
    ?>

    <?php if (isset($error)): ?>
        <h2 class="resultado"><?php echo htmlspecialchars($error); ?></h2>
    <?php elseif (isset($resultado)): ?>
        <h2 class="resultado">Resultado: <?php echo htmlspecialchars($resultado); ?></h2>
    <?php endif; ?>
</body>
</html>
