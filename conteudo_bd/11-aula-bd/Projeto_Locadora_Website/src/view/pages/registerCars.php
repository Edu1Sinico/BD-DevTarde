<?php
include '../../controller/carrosController.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = cadastrarVeiculo($pdo);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Cadastrar Veículo</title>
    <link rel="stylesheet" href="../../templates/fragmentsCSS/styleHeader.css">
    <link rel="stylesheet" href="../../templates/fragmentsCSS/styleFooter.css">
    <link rel="stylesheet" href="../../templates/pagesCSS/styleRegisterCar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Seção header -->
    <div class="div-header-import">
        <?php include '../fragments/header.php'; ?>
    </div>

    <!-- Seção principal -->
    <main>
        <div class="div-form-register-car">
            <!-- Exibe a mensagem de sucesso ou erro -->
            <?php if ($message) : ?>
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="div-form-register-car-title">
                <h1>Cadastrar Veículo</h1>
            </div>

            <form action="" method="post">
                <div class="div-form-section">
                    <div class="div-form-section-left">
                        <input class="input-text" type="text" name="id_carro" placeholder="Insira o ID do veículo" required>
                        <input class="input-text" type="text" name="modelo" placeholder="Insira o modelo do veículo" required>
                        <input class="input-text" type="text" name="ano" placeholder="Insira o ano do veículo" required>
                    </div>
                    <div class="div-form-section-right">
                        <input class="input-text" type="text" name="placa" placeholder="Insira a placa do veículo" required>
                        <div class="div-select-box-type">
                            <label for="tipo">Tipo:</label>
                            <select name="tipo">
                                <option value="Sedan">Sedan</option>
                                <option value="Hatchback">Hatchback</option>
                                <option value="SUV">SUV</option>
                                <option value="Pickup">Pickup</option>
                                <option value="Compacto">Compacto</option>
                                <option value="Van">Van</option>
                            </select>
                        </div>
                        <div class="div-select-box-available">
                            <label for="disponibilidade">Disponibilidade:</label>
                            <select name="disponibilidade" required>
                                <option value="true">Disponível</option>
                                <option value="false">Indisponível</option>
                            </select>
                        </div>
                        <div class="div-sumbit-btn-section">
                            <input type="submit" value="Enviar" class="submit-btn">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="div-cars-list-import">
            <?php include '../fragments/lists/carsList.php'; ?>
        </div>

    </main>

    <!-- Seção footer -->
    <div class="div-footer-import">
        <?php include '../fragments/footer.php'; ?>
    </div>

</body>

</html>