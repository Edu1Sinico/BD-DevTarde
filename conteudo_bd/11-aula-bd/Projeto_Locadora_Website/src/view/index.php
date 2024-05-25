<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Home</title>
    <link rel="stylesheet" href="../templates/fragmentsCSS/styleHeader.css">
    <link rel="stylesheet" href="../templates/fragmentsCSS/styleFooter.css">
    <link rel="stylesheet" href="../templates/styleHome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Seção header -->
    <div class="div-header-import">
        <?php include 'fragments/header.php'; ?>
    </div>
    <!-- Seção principal -->
    <main>
        <!-- Seção banner -->
        <div class="div-banner-section">
            <img src="../assets/banner/locadora-banner.png" alt="banner">
        </div>
        <!-- Seção sobre nós -->
        <div class="div-about-us" id="about-us">
            <div class="div-about-us-1">
                <div class="div-about-us-title">
                    <h1 class="about-us-title">BEM-VINDO AO</h1>
                    <h1 class="about-us-subtitle">NOSSO SITE</h1>
                </div>
                <div class="div-about-us-info">
                    <p class="about-us-info">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="div-about-us-button">
                    <button>Saiba Mais</button>
                </div>
            </div>
            <div class="div-about-us-2">
                <div class="div-about-us-img">
                    <img src="" alt="example">
                </div>
            </div>
        </div>
        <!-- Seção cards dos veículos-->
        <div class="div-cards-section">
            <div class="div-cards-title">
                <h1>CONHEÇA OS NOSSOS VEÍCULOS!</h1>
            </div>
        <div class="div-cards">
            <div class="div-card-car">
                    <div class="div-car-img">
                        <img src="../assets/carros-miniatura/polo.png" alt="carro">
                    </div>
                    <div class="div-car-info">
                    <div class="car-title">
                            <h2>Polo</h2>
                        </div>
                        <ul>
                            <li>Ano: 2018</li>
                            <li>Tipo: Hatchback</li>
                            <li>Marca: Volkswagen</li>
                        </ul>
                    </div>
                    <div class="div-car-button">
                        <button>Alugar</button>
                    </div>
                </div>
                <div class="div-card-car">
                    <div class="div-car-img">
                        <img src="../assets/carros-miniatura/onix.png" alt="carro">
                    </div>
                    <div class="div-car-info">
                        <div class="car-title">
                            <h2>Onix</h2>
                        </div>
                        <ul>
                            <li>Ano: 2024</li>
                            <li>Tipo: Hatchback</li>
                            <li>Marca: Chevrolet</li>
                        </ul>
                    </div>
                    <div class="div-car-button">
                        <button>Alugar</button>
                    </div>
                </div>
                <div class="div-card-car">
                    <div class="div-car-img">
                        <img src="../assets/carros-miniatura/mobi.png" alt="carro">
                    </div>
                    <div class="div-car-info">
                        <div class="car-title">
                            <h2>Mobi</h2>
                        </div>
                        <ul>
                            <li>Ano: 2020</li>
                            <li>Tipo: Hatchback</li>
                            <li>Marca: Fiat</li>
                        </ul>
                    </div>
                    <div class="div-car-button">
                        <button>Alugar</button>
                    </div>
                </div>
            </div>
            <div class="div-cards-section-button">
                <button>Ver Todos</button>
            </div>
        </div>
    </main>
    <!-- Seção footer -->
    <div class="div-footer-import">
        <?php include 'fragments/footer.php'; ?>
    </div>
</body>

</html>