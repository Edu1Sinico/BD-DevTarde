<?php
include 'controller/loginController.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = loginUser($pdo);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoroad - Login</title>
    <link rel="stylesheet" href="templates/pagesCSS/styleLogin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <form class="form-login" action="" method="post">
            <div class="div-form-login-title">
                <h1>Realizar o Login</h1>
            </div>
            <div class="div-form-login-section">
                <div class="input-section">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" placeholder="Informe o seu E-mail" required>
                </div>
                <div class="input-section">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" placeholder="Informe a sua Senha" required>
                </div>
            </div>
            <div class="div-form-login-btn">
                <input type="submit" value="Entrar">
            </div>
            <?php if ($message) : ?>
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        </form>
    </main>
</body>

</html>