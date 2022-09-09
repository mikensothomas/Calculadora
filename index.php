<?php
require_once 'calcula.php';

$n1 = $_GET['n1'] ?? null;
$n2 = $_GET['n2'] ?? null;
$op = $_GET['op'] ?? null;
$resultado = $_GET['resultado'] ?? null;

$valido = isset($n1) && isset($n2) && isset($op);

if ($valido) {

    try {
        $calcula = new Calculadora($n1, $n2);

        switch($op) {
            case 'soma':
                $resultado = $calcula->somar();
                break;

            case 'mul':
                $resultado = $calcula->multiplicar();
                break;

            case 'div':
                $resultado = $calcula->dividir();
                break;

            case 'sub':
                $resultado = $calcula->subtrair();
                break;

            default:
                $resultado = "Operação Invalida";
                break;

        }
    }catch (\Throwable $th) {
        $resultado = $th->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
  <h3>Calculadora simples</h3>
  <p>Calcuador para fazer operação</p>
</header>
<main>
    <div class="container">
        <fieldset>
        <form action="index.php" method="GET" id="formulario">
            <div>
               <label for="n1">Informe um número</label>
               <input type="number" name="n1" id="n1" placeholder="Informe num número" value="<?php echo $n1?> required autofocus">
            </div>
            <div class="linha">
               <label for="n2">Informe um número:</label>
               <input type="number" name="n2" id="n2" placeholder="Informe num número" value="<?php echo $n2?> required autofocus">
            </div>

            <div class="linha">
                <div>
                    <input type="radio" name="op" id="soma" value="soma" <?php echo $op == 'soma' ? 'checked' : null ?> >
                    <label for="soma">Soma</label>
                </div>
                <div>
                   <input type="radio" name="op" id="sub" value="sub" <?php echo $op == 'sub' ? 'checked' : null ?> >
                   <label for="sub">Subtração</label>
                </div>
                <div>
                   <input type="radio" name="op" id="mul" value="mul" <?php echo $op == 'mul' ? 'checked' : null ?> >
                   <label for="mul">Multiplicação</label>
                </div>
                <div>
                   <input type="radio" name="op" id="div" value="div" <?php echo $op == 'div' ? 'checked' : null ?> >
                   <label for="div">Divisão</label>
                </div>
            </div>

            <div class="ação">
                <input type="submit" value="calcular">
            </div>
        </form>
        </fieldset>
    </div>
    <div class="container">
        <p class="resultado">
            <?php echo $resultado; ?>

       </hr>
        </p>
    </div>
    <pre>
        <?php print_r($_SERVER) ?>
    </pre>
</main>

</body>
</html>