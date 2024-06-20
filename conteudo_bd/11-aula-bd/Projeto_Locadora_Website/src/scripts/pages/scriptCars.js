document.addEventListener('DOMContentLoaded', () => {
    const table = document.getElementById('cars-table-id');
    const form = document.getElementById('register-car-form-id');
    const submitBtn = document.getElementById('submit-btn-id');
    const deleteBtn = document.getElementById('delete-btn-id');
    const operationField = document.getElementById('operation-id');
    const idField = form.elements['id_carro'];

    table.addEventListener('click', (event) => {
        const target = event.target;
        const row = target.closest('tr');

        if (row && row.parentNode.tagName === 'TBODY') {
            // Remove a classe 'selected' de todas as linhas
            Array.from(table.getElementsByTagName('tr')).forEach(row => {
                row.classList.remove('selected');
            });

            // Adiciona a classe 'selected' na linha clicada
            row.classList.add('selected');

            // Obtém os dados da linha clicada
            const cells = row.getElementsByTagName('td');
            const rowData = {
                id_carro: cells[0].innerText,
                modelo: cells[1].innerText,
                ano: cells[2].innerText,
                placa: cells[3].innerText,
                tipo: cells[4].innerText,
                disponibilidade: cells[5].innerText === 'Disponível' ? 'true' : 'false',
            };

            // Preenche o formulário com os dados da linha
            idField.value = rowData.id_carro;
            idField.readOnly = true;
            form.elements['modelo'].value = rowData.modelo;
            form.elements['ano'].value = rowData.ano;
            form.elements['placa'].value = rowData.placa;
            form.elements['tipo'].value = rowData.tipo;
            form.elements['disponibilidade'].value = rowData.disponibilidade;
            submitBtn.value = "Atualizar";
            document.getElementById("delete-btn-section-id").style.display = "flex";
            operationField.value = "atualizar";
            document.getElementById("register-car-title-id").style.display = "none";
            document.getElementById("update-car-title-id").style.display = "block";
        }
    });

    submitBtn.addEventListener('click', function () {
        if (operationField.value === 'cadastrar') {
            idField.value = "";
            idField.readOnly = false;
            form.reset();
            submitBtn.value = "Enviar";
            document.getElementById("delete-btn-section-id").style.display = "none";
            document.getElementById("register-car-title-id").style.display = "block";
            document.getElementById("update-car-title-id").style.display = "none";
        }
    });

    deleteBtn.addEventListener('click', function () {
        if (confirm('Tem certeza de que deseja excluir este veículo?')) {
            operationField.value = 'excluir';
            form.submit();
        }
    });
});
