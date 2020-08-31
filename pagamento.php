<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Folha de Pagamento</title>
</head>
<body>
    
    <?php
        //Variáveis POST
        $nome = $_POST['nome'];
        $horasTrabalhadas = $_POST['horasTrabalhadas'];
        $valorHora = $_POST['valorHora'];

        //Variáveis Cálculos
        $salarioBruto = 0;
        $iR = 0;
        $iNSS = 0; 
        $fGTS = 0;
        $salarioLiquido = 0;

        //Validar se há campos em branco
        if(empty($_POST['nome']) || empty($_POST['horasTrabalhadas']) || empty($_POST['valorHora'])){
                echo "<div class='alert alert-danger' role='alert'>Há campos em branco. Insira novamente as informações.</div>";
                echo "<p><a href='index.php'>Voltar</p>";
            }
        else{
                echo "<ul class='list-group-item'>";
                echo "<li class='list-group-item active'>Entrada - Funcionário</li>";
                echo "<li class='list-group-item'><b>Nome: </b>$nome</li>";
                echo "<li class='list-group-item'><b>Valor por hora</b>: $valorHora R$</li>";
                echo "<li class='list-group-item'><b>Total de Horas Tabalhadas: </b>$horasTrabalhadas horas</li></ul>";

                //Cálculo Salário Bruto
                $salarioBruto = $horasTrabalhadas * $valorHora;

                //Cálculo IR
                if ($salarioBruto >= 2743.25){                   
                        $iR = $salarioBruto * 27.5 / 100;
                    }
                elseif ($salarioBruto >= 1372.25){
                        $iR = $salarioBruto * 15 / 100;
                    }
                else{
                        $iR = 0;
                }

                //Cálculo INSS
                if ($salarioBruto >= 2894.28){
                    $iNSS = $salarioBruto - ($salarioBruto - 318.37);
                }
                elseif ($salarioBruto >= 1447.15){
                    $iNSS = $salarioBruto * 11 / 100;
                }
                elseif ($salarioBruto >= 868.30){
                    $iNSS = $salarioBruto * 9 / 100;
                }
                elseif ($salarioBruto <= 868.29){
                    $iNSS = $salarioBruto * 8 / 100;
                }

                //Cálculo FGTS
                $fGTS = $salarioBruto * 8 / 100;

                //Cálculo Salário Líquido
                $salarioLiquido = $salarioBruto - $iR - $iNSS;

                //Number Format
                $salarioBruto = number_format($salarioBruto, 2,',','.');
                $salarioLiquido = number_format($salarioLiquido, 2,',','.');
                $horasTrabalhadas = number_format($horasTrabalhadas, 2,',','.');
                $iR = number_format($iR, 2,',','.');
                $fGTS = number_format($fGTS, 2,',','.');
                $iNSS = number_format($iNSS, 2,',','.');

                //Prints

                echo "<ul class='list-group-item'>";
                echo "<li class='list-group-item active'>Saída - Folha de Pagamento</li>";
                echo "<li class='list-group-item'><b>Salário Bruto:</b> $salarioBruto R$</li>";
                echo "<li class='list-group-item'><b>Desconto IR: </b>$iR R$</li>";
                echo "<li class='list-group-item'><b>Desconto INSS: </b>$iNSS R$</li>";
                echo "<li class='list-group-item'><b>Desconto FGTS: </b>$fGTS R$</li>";
                echo "<li class='list-group-item'><b>Salário Líquido: </b>$salarioLiquido R$</li></ul>";

                echo "<p><a href='index.php'>Voltar para Home</a></p>";
            }        
    ?>

</body>
</html>