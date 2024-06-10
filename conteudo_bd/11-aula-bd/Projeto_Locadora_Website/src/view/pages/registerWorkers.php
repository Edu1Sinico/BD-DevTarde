<?php
include '../../controller/funcionariosController.php';
// include '../../controller/agenciaController.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = cadastrarFuncionario($pdo);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Cadastrar Funcionários</title>
    <link rel="stylesheet" href="../../templates/fragmentsCSS/styleHeader.css">
    <link rel="stylesheet" href="../../templates/fragmentsCSS/styleFooter.css">
    <link rel="stylesheet" href="../../templates/pagesCSS/styleRegisterWorkers.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Seção header -->
    <div class="div-header-import">
        <?php include '../fragments/header.php'; ?>
    </div>

    <!-- Seção principal -->
    <main>
        <section class="div-form-register-worker">
            <!-- Exibe a mensagem de sucesso ou erro -->
            <?php if ($message) : ?>
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="div-form-register-worker-title">
                <h1>Cadastrar Funcionário</h1>
            </div>

            <form action="" method="post">
                <div class="div-form-section">
                    <div class="div-form-section-left">
                        <input class="input-text" type="number" min="0" name="id_funcionario" placeholder="Insira o ID do funcionário" required>
                        <input class="input-text" type="text" name="nome" placeholder="Insira o nome do funcionário" required>
                        <input class="input-text" type="text" name="sobrenome" placeholder="Insira o sobrenome do funcionário" required>
                        <input class="input-text" type="text" name="cargo" placeholder="Insira o cargo do funcionário" required>
                    </div>
                    <div class="div-form-section-right">
                        <input class="input-text" type="number" min="0" name="salario" placeholder="Insira o salário do funcionário" required>
                        <input class="input-text" type="date" name="data_contratacao">
                        <div class="div-select-box-available">
                            <label for="num_agencia">Número da Agência:</label>
                            <select name="num_agencia" required>
                                <?php /*
                                $agencias = listarAgencia($pdo);

                                foreach ($agencias as $agencia) :
                                ?>
                                    <option value="<?php $agencia['num_agencia']; ?>"><?php echo $agencia['num_agencia']; ?></option>
                                <?php endforeach; */ ?>
                            </select>
                        </div>
                    </div>
                    <div class="div-sumbit-btn-section">
                        <input type="submit" value="Enviar" class="submit-btn">
                    </div>
                </div>
            </form>
        </section>

        <section class="div-table-workers-section">
            <div class="div-table-workers-section-title">
                <h1>Funcionários Cadastrados</h1>
            </div>
            <div class="div-table-workers-section-table">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Cargo</th>
                        <th>Salário</th>
                        <th>Data de contratação</th>
                        <th>Nº Agência</th>
                    </thead>
                    <?php

                    // Chamar a função listarFuncionarios para obter os funcionarios
                    $funcs = listarFuncionarios($pdo);

                    // Iterar sobre os funcionarios e exibi-los na tabela
                    foreach ($funcs as $func) :
                    ?>
                        <tbody>
                            <td><?php echo $func['id_funcionario']; ?></td>
                            <td><?php echo $func['nome']; ?></td>
                            <td><?php echo $func['sobrenome']; ?></td>
                            <td><?php echo $func['workergo']; ?></td>
                            <td><?php echo $func['salario']; ?></td>
                            <td><?php echo $func['data_contratacao']; ?></td>
                            <td><?php echo $func['num_agencia']; ?></td>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>

    </main>

    <!-- Seção footer -->
    <div class="div-footer-import">
        <?php include '../fragments/footer.php'; ?>
    </div>

</body>

</html>