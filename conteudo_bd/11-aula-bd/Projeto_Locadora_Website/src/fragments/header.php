<?php
session_start();
?>

<header class="header-fragment">
    <div class="header-section-logo">
        <div class="div-logo-header">
            <img src="" alt="Logo">
        </div>
    </div>
    <div class="header-section-menu">
        <div class="div-menu">
            <div class="div-menu-contact-login-register">
                <div class="div-contact">
                    <a href="#"><i class="fas fa-regular fa-envelope"></i></a>
                    <a href="#"><i class="fas fa-regular fa-phone"></i></a>
                    <a href="#"><i class="fas fa-regular fa-laptop"></i></a>
                </div>
                <div class="div-btn-login-register">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <div class="div-user-info">
                            <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <a href="controller/logoutController.php"><button class="logout-btn">Sair</button></a>
                        </div>
                    <?php else : ?>
                        <div class="div-login">
                            <a href="../loginUser.php"><button class="login-btn">Login</button></a>
                        </div>
                        <div class="div-register">
                            <a href="../registerUser.php"><button class="register-btn">Cadastrar</button></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <nav class="nav-links">
                <ul>
                    <li><a href="../">Home</a></li>
                    <li><a href="#about-us">Sobre Nós</a></li>
                    <li><a href="../">Veículos</a></li>
                    <li><a href="../">Nossas Lojas</a></li>
                    <li><a href="../">Fale Conosco</a></li>
                    <?php if ($_SESSION['user_tipo'] == 'funcionario') : ?>
                        <li><a href="../registerCars.php">Cadastro de Veículos</a></li>
                        <li><a href="../registerWorkers.php">Cadastro de Funcionários</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>