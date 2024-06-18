<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Cadastro de Cliente</title>
    <link rel="stylesheet" href="../../templates/fragmentsCSS/styleHeader.css">
    <link rel="stylesheet" href="../../templates/fragmentsCSS/styleFooter.css">
    <link rel="stylesheet" href="../../templates/pagesCSS/styleRegisterUsers.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Seção header -->
    <div class="div-header-import">
        <?php include '../fragments/header.php'; ?>
    </div>

    <main>
        <section class="div-form-register-client">

            <div class="div-form-register-client-title">
                <h1>Realize o seu cadastro!</h1>
            </div>

            <form action="" method="post">
                <div class="div-form-section">
                    <div class="div-form-section-left">
                        <input class="input-text" type="number" min="0" name="id_cliente" placeholder="ID" readonly value="1">
                        <input class="input-text" type="text" name="nome" placeholder="Insira o seu nome" required>
                        <input class="input-text" type="text" name="sobrenome" placeholder="Insira o seu sobrenome" required>
                        <input class="input-text" type="email" name="email" placeholder="Insira o seu E-mail" required>
                        <input class="input-text" type="text" name="celular" placeholder="Insira o seu Nº do Celular" required>
                    </div>
                    <div class="div-form-section-right">
                        <input class="input-text" type="password" name="senha" placeholder="Insira uma senha" required>
                        <input class="input-text" type="password" placeholder="Confirmar Senha" required>
                        <div class="div-select-box-type">
                            <!-- <label for="estado">Estado:</label> -->
                            <select name="estado">
                                <option value="">Selecione um Estado</option>
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
                        <input class="input-text" type="text" name="cidade" placeholder="Insira a sua Cidade" required>
                        <input class="input-text" type="text" name="endereco" placeholder="Insira o seu Endereço" required>
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
        <?php include '../fragments/footer.php'; ?>
    </div>
</body>

</html>