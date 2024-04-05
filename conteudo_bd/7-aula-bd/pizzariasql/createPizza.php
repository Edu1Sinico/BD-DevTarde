<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Configura as variáveis que serão inserid_pizzaas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
    $id_pizza = isset($_POST['id_pizza']) && !empty($_POST['id_pizza']) && $_POST['id_pizza'] != 'auto' ? $_POST['id_pizza'] : NULL;
    // Verifica se a variável POST "nome" existe, se não existir, atribui o valor padrão para vazio, basicamente o mesmo para todas as variáveis
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    // Insere um novo registro na tabela contacts
    $stmt = $pdo->prepare('INSERT INTO pizza_sabores(id_pizza, nome) VALUES (?, ?)');
    $stmt->execute([$id_pizza, $nome]);
    // Mensagem de saída
    $msg = 'Pizza Cadastrada com Sucesso!';
}
?>


<?=template_header('Cadastro de Pizzas')?>

<div class="content update">
	<h2>Registrar Pizza</h2>
    <form action="createPizza.php" method="post">
        <label for="id_pizza">ID</label>
        <label for="nome">Nome</label>
        <input type="text" name="id_pizza" placeholder="" value="" id="id_pizza" >
        <input type="text" name="nome" placeholder="Seu Nome" id="nome">
        <input type="submit" value="Criar">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>