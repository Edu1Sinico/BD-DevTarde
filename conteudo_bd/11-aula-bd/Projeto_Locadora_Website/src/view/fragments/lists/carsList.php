<section class="div-table-vehicles-section">
    <div class="div-table-vehicles-section-title">
        <h1>Veículos Cadastrados</h1>
    </div>
    <div class="div-table-vehicles-section-table">
        <table border="2px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Placa</th>
                    <th>Tipo</th>
                    <th>Disponibilidade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir o arquivo de controle para acessar a função listarVeiculos
                include '../../controller/carrosController.php';

                // Chamar a função listarVeiculos para obter os veículos
                $carros = listarVeiculos($pdo);

                // Iterar sobre os veículos e exibi-los na tabela
                foreach ($carros as $carro) :
                ?>
                    <tr>
                        <td><?php echo $carro['id_carro']; ?></td>
                        <td><?php echo $carro['modelo']; ?></td>
                        <td><?php echo $carro['ano']; ?></td>
                        <td><?php echo $carro['placa']; ?></td>
                        <td><?php echo $carro['tipo']; ?></td>
                        <td><?php echo $carro['disponibilidade']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>