<?php
include '../../controller/funcionariosController.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['operation'] == 'cadastrar') {
        $message = cadastrarFuncionario($pdo);
    } elseif ($_POST['operation'] == 'atualizar') {
        $message = atualizarFuncionario($pdo);
    }
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
                <h1 id="register-worker-title-id">Cadastrar Funcionário</h1>
                <h1 id="update-worker-title-id">Atualizar Funcionário</h1>
            </div>

            <form action="" method="post" id="register-worker-form-id">
                <div class="div-form-section">
                    <div class="div-form-section-left">
                        <?php
                        $funcsLast = listarUltimoFuncionario($pdo);
                        $minIdFuncionario = $funcsLast ? $funcsLast : 0; // Defina um valor padrão caso a função retorne null

                        ?>
                        <input type="hidden" name="operation" value="cadastrar" id="operation-id">
                        <input class="input-text" type="number" min="<?php echo htmlspecialchars($minIdFuncionario, ENT_QUOTES, 'UTF-8') + 1; ?>" name="id_funcionario" placeholder="Insira o ID do funcionário" required id="id-funcionario">
                        <input class="input-text" type="text" name="nome" placeholder="Insira o nome do funcionário" required id="nome">
                        <input class="input-text" type="text" name="sobrenome" placeholder="Insira o sobrenome do funcionário" required id="sobrenome">
                        <input class="input-text" type="text" name="cargo" placeholder="Insira o cargo do funcionário" required id="cargo">
                    </div>
                    <div class="div-form-section-right">
                        <input class="input-text" type="number" min="0" name="salario" placeholder="Insira o salário do funcionário" required id="salario">
                        <input class="input-text" type="date" name="data_contratacao" id="data_contratacao">
                        <input class="input-text" type="number" min="1" name="num_agencia" placeholder="Insira o Nº da Agência" required id="num_agencia">
                    </div>
                </div>
                <div class="div-btn-section">
                    <!-- Botão de enviar -->
                    <div class="div-sumbit-btn-section">
                        <input type="submit" value="Enviar" class="submit-btn" id="submit-btn-id">
                    </div>
                    <!-- Botão de excluir -->
                    <div class="div-delete-btn-section" id="delete-btn-section-id" style="display: none;">
                        <input type="button" value="Excluir" class="delete-btn" id="delete-btn-id">
                    </div>
                </div>
            </form>
        </section>

        <section class="div-table-workers-section">
            <div class="div-table-workers-section-title">
                <h1>Funcionários Cadastrados</h1>
            </div>
            <div class="div-table-workers-section-table">
                <table id="workers-table-id">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Cargo</th>
                            <th>Salário</th>
                            <th>Data de contratação</th>
                            <th>Nº Agência</th>
                        </tr>
                    </thead>
                    <?php

                    // Chamar a função listarFuncionarios para obter os funcionarios
                    $funcs = listarFuncionarios($pdo);

                    // Iterar sobre os funcionarios e exibi-los na tabela
                    foreach ($funcs as $func) :
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $func['id_funcionario']; ?></td>
                                <td><?php echo $func['nome']; ?></td>
                                <td><?php echo $func['sobrenome']; ?></td>
                                <td><?php echo $func['cargo']; ?></td>
                                <td><?php echo $func['salario']; ?></td>
                                <td><?php echo $func['data_contratacao']; ?></td>
                                <td><?php echo $func['num_agencia']; ?></td>
                            </tr>
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


<script src="../../scripts/pages/scriptWorkers.js"></script>

</html>