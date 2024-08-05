<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triángulo</title>
</head>
<body style="background-color:beige;">
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            padding-top: 160px;
        }
        input[type="number"]{
            border-radius: 15px;
            border: 1px solid;
        }
        input[type="submit"]{
            border-radius: 3px;
            cursor: pointer;
            border-color: bisque;
            margin-left: 20px;
            margin-top: 5px;
            
        }
    </style>
    <h1>Medidas del triángulo</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Lado 1: <input type="number" name="lado1" step="any" required>
        <br><br>
        Lado 2: <input type="number" name="lado2" step="any" required>
        <br><br>
        Lado 3: <input type="number" name="lado3" step="any" required>
        <br><br>
        <input type="submit" value="Determinar tipo de triángulo">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
        $lado1 = filter_input(INPUT_POST, 'lado1', FILTER_VALIDATE_FLOAT);
        $lado2 = filter_input(INPUT_POST, 'lado2', FILTER_VALIDATE_FLOAT);
        $lado3 = filter_input(INPUT_POST, 'lado3', FILTER_VALIDATE_FLOAT);

        if ($lado1 === false || $lado2 === false || $lado3 === false || $lado1 <= 0 || $lado2 <= 0 || $lado3 <= 0) {
            $error = "Error: Los valores introducidos deben ser números positivos.";
        } else {

            $resultado = tipoDeTriangulo($lado1, $lado2, $lado3);
        }
    }
    function tipoDeTriangulo($a, $b, $c) {
        if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
            if ($a == $b && $b == $c) {
                return "Equilátero";
            } elseif ($a == $b || $a == $c || $b == $c) {
                return "Isósceles";
            } else {
                return "Escaleno";
            }
        } else {
            return "Las medidas ingresadas no forman un triángulo válido.";
        }
    }
    ?>

    <?php if (isset($error)): ?>
        <h2><?php echo htmlspecialchars($error); ?></h2>
    <?php elseif (isset($resultado)): ?>
        <h2>Tipo de triángulo: <?php echo htmlspecialchars($resultado); ?></h2>
    <?php endif; ?>
</body>
</html>
