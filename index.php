<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Funcionários - Home</title>
</head>

<body>

    <div class="container">
        <h1>Área do Funcionário</h1>

        <h3>Folha de Pagamento</h3>
        <p>Insira informações do funcionário para cálculo de Folha de Pagamento.</p>
    </div>

    <form action="pagamento.php" method="post">
        <div class="form-group">
            <label for="nome">Nome do funcionário:</label><br>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo">

            <label for="horasTrabalhadas">Número de Horas Trabalhadas:</label><br>
            <input type="number" class="form-control" name="horasTrabalhadas" id="horasTrabalhadas" placeholder="Valor total" step="0.01" min="1">

            <label for="valorHora">Valor Hora de Trabalho:</label><br>
            <input type="number" class="form-control" name="valorHora" id="valorHora" placeholder="0,00 R$" step="0.01" min="1">

            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-primary">Apagar</button>
        </div>
    </form>


</body>
</html>