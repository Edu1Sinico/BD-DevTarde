<?php
include 'controller/clientesController.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['operation'] == 'cadastrar') {
        $message = cadastrarCliente($pdo);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Cadastro de Cliente</title>
    <link rel="stylesheet" href="templates/fragmentsCSS/styleHeader.css">
    <link rel="stylesheet" href="templates/fragmentsCSS/styleFooter.css">
    <link rel="stylesheet" href="templates/pagesCSS/styleRegisterUsers.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Seção header -->
    <div class="div-header-import">
        <?php include 'fragments/header.php'; ?>
    </div>

    <main>
        <section class="div-form-register-client">
            <!-- Exibe a mensagem de sucesso ou erro -->
            <?php if ($message) : ?>
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="div-form-register-client-title">
                <h1>Realize o seu cadastro!</h1>
            </div>

            <form id="register-form" action="" method="post" onsubmit="return validateForm()">
                <div class="div-form-section">
                    <div class="div-form-section-left">
                        <?php
                        $cliLast = listarUltimoCliente($pdo);
                        $minIdcliente = $cliLast ? $cliLast : 0; // Defina um valor padrão caso a função retorne null
                        ?>
                        <input type="hidden" name="operation" value="cadastrar" id="operation-id">
                        <input class="input-text" type="number" min="0" name="id_cliente" placeholder="ID" readonly value="<?php echo htmlspecialchars($minIdcliente, ENT_QUOTES, 'UTF-8') + 1; ?>">
                        <input class="input-text" type="text" name="nome" placeholder="Insira o seu nome" required maxlength="125">
                        <input class="input-text" type="text" name="sobrenome" placeholder="Insira o seu sobrenome" required maxlength="125">
                        <input class="input-text" type="email" name="email" placeholder="Insira o seu E-mail" required maxlength="100">
                        <input class="input-text" type="text" name="celular" placeholder="Insira o seu Nº do Celular" required maxlength="15">
                    </div>
                    <div class="div-form-section-right">
                        <input class="input-text" type="password" name="senha" placeholder="Insira uma senha" required maxlength="25">
                        <input class="input-text" type="password" name="confirmar_senha" placeholder="Confirmar Senha" required maxlength="25">
                        <div class="div-select-box-type">
                            <select name="estado" required>
                                <option value="">Selecione um Estado</option>
                                <!-- opções dos estados -->
                                <option value="AC">AC</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                        <input class="input-text" type="text" name="cidade" placeholder="Insira a sua Cidade" required maxlength="255">
                        <input class="input-text" type="text" name="endereco" placeholder="Insira o seu Endereço" required maxlength="255">
                    </div>
                </div>
                <div class="div-sumbit-btn-section">
                    <input type="submit" value="Enviar" class="submit-btn">
                </div>
            </form>
        </section>
    </main>

    <!-- Seção footer -->
    <div class="div-footer-import">
        <?php include 'fragments/footer.php'; ?>
    </div>

    <!-- JavaScript de validação -->
    <script>
        function validateForm() {
            // Validação de senha
            const senha = document.querySelector('input[name="senha"]');
            const confirmarSenha = document.querySelector('input[name="confirmar_senha"]');
            if (senha.value !== confirmarSenha.value) {
                alert("As senhas não coincidem.");
                return false;
            }

            // Formatação do telefone
            const celular = document.querySelector('input[name="celular"]');
            celular.value = celular.value.replace(/[^\d]/g, '');

            // Validação de comprimento dos campos
            const campos = [{
                    nome: 'nome',
                    max: 125
                },
                {
                    nome: 'sobrenome',
                    max: 125
                },
                {
                    nome: 'email',
                    max: 100
                },
                {
                    nome: 'cidade',
                    max: 255
                },
                {
                    nome: 'endereco',
                    max: 255
                },
                {
                    nome: 'senha',
                    max: 25
                },
                {
                    nome: 'confirmar_senha',
                    max: 25
                }
            ];

            for (const campo of campos) {
                const input = document.querySelector(`input[name="${campo.nome}"]`);
                if (input.value.length > campo.max) {
                    alert(`O campo ${campo.nome} não pode exceder ${campo.max} caracteres.`);
                    return false;
                }
            }

            return true;
        }
    </script>
</body>

</html>