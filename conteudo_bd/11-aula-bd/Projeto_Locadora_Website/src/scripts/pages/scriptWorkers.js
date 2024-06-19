document.addEventListener('DOMContentLoaded', () => {
    const table = document.getElementById('workers-table-id');
    const form = document.getElementById('register-worker-form-id');
    const deleteBtn = document.getElementById('delete-btn-id');
    const operationField = document.getElementById('operation-id');
    const idField = form.elements['id_funcionario'];

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
                id_funcionario: cells[0].innerText,
                nome: cells[1].innerText,
                sobrenome: cells[2].innerText,
                cargo: cells[3].innerText,
                salario: cells[4].innerText,
                email: cells[5].innerText,
                data_contratacao: cells[6].innerText,
                num_agencia: cells[7].innerText
            };

            // Preenche o formulário com os dados da linha
            form.elements['id_funcionario'].value = rowData.id_funcionario;
            form.elements['nome'].value = rowData.nome;
            form.elements['sobrenome'].value = rowData.sobrenome;
            form.elements['cargo'].value = rowData.cargo;
            form.elements['salario'].value = rowData.salario;
            form.elements['data_contratacao'].value = rowData.data_contratacao;
            form.elements['num_agencia'].value = rowData.num_agencia;
            form.elements['email'].value = rowData.email;

            // Esconder o campo de senha ao atualizar
            document.getElementById("senha").style.display = "none";
            document.getElementById("submit-btn-id").value = "Atualizar";
            document.getElementById("delete-btn-section-id").style.display = "flex";
            document.getElementById("operation-id").value = "atualizar";
            document.getElementById("register-worker-title-id").style.display = "none";
            document.getElementById("update-worker-title-id").style.display = "block";
        }
    });

    form.addEventListener('submit', function (event) {
        const operation = operationField.value;
        if (operation === 'cadastrar' && !idField.value) {
            event.preventDefault();
            alert('Por favor, preencha todos os campos.');
        }
    });

    deleteBtn.addEventListener('click', function () {
        if (confirm('Você tem certeza que deseja excluir este funcionário?')) {
            operationField.value = 'excluir';
            form.submit();
        }
    });
});
