<?php
include 'controller/carrosController.php';
$pdo = pdo_connect_pgsql();

// Recuperar os filtros
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : null;
$disponibilidade = isset($_GET['disponibilidade']) ? $_GET['disponibilidade'] : null;

// Chamar a função filtrarVeiculos para obter os veículos
$carros = filtrarVeiculos($pdo, $tipo, $disponibilidade);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Veículos</title>
    <link rel="stylesheet" href="templates/pagesCSS/styleListCars.css">
    <link rel="stylesheet" href="templates/fragmentsCSS/styleHeader.css">
    <link rel="stylesheet" href="templates/fragmentsCSS/styleFooter.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Seção header -->
    <div class="div-header-import">
        <?php include 'fragments/header.php'; ?>
    </div>

    <!-- Seção principal -->
    <main class="main-list-cars-section">
        <div class="div-list-cars-title">
            <h1>Nossos Veículos:</h1>
        </div>

        <form class="div-filter-section" method="GET">
            <!-- Tipo -->
            <div class="div-filter">
                <select name="tipo">
                    <option value="">Selecione um Tipo</option>
                    <option value="Sedan" <?php echo $tipo == 'Sedan' ? 'selected' : ''; ?>>Sedan</option>
                    <option value="Hatchback" <?php echo $tipo == 'Hatchback' ? 'selected' : ''; ?>>Hatchback</option>
                    <option value="SUV" <?php echo $tipo == 'SUV' ? 'selected' : ''; ?>>SUV</option>
                    <option value="Pickup" <?php echo $tipo == 'Pickup' ? 'selected' : ''; ?>>Pickup</option>
                    <option value="Compacto" <?php echo $tipo == 'Compacto' ? 'selected' : ''; ?>>Compacto</option>
                    <option value="Van" <?php echo $tipo == 'Van' ? 'selected' : ''; ?>>Van</option>
                </select>
            </div>
            <!-- Disponibilidade -->
            <div>
                <input type="radio" name="disponibilidade" value="" <?php echo $disponibilidade === null ? 'checked' : ''; ?>> Todos
                <input type="radio" name="disponibilidade" value="true" <?php echo $disponibilidade === 'true' ? 'checked' : ''; ?>> Disponível
                <input type="radio" name="disponibilidade" value="false" <?php echo $disponibilidade === 'false' ? 'checked' : ''; ?>> Indisponível
            </div>
            <button type="submit">Filtrar</button>
        </form>

        <section class="section-list-cars-card">
            <?php foreach ($carros as $carro) : ?>
                <div class="div-cars-card-section">
                    <div class="div-card-car">
                        <div class="div-car-info">
                            <div class="car-title">
                                <h2><?php echo $carro['modelo']; ?></h2>
                            </div>
                            <ul>
                                <li>Ano: <span><?php echo $carro['ano']; ?></span></li>
                                <li>Tipo: <span><?php echo $carro['tipo']; ?></span></li>
                                <li>Disponibilidade: <span><?php echo $carro['disponibilidade'] == 1 ? 'Disponível' : 'Indisponível'; ?></span></li>
                            </ul>
                        </div>
                        <div class="div-car-button">
                            <button>Alugar</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- Seção footer -->
    <div class="div-footer-import">
        <?php include 'fragments/footer.php'; ?>
    </div>
</body>

</html>
