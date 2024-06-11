document.addEventListener('DOMContentLoaded', () => {
    const table = document.getElementById('workers-table-id');
    const form = document.getElementById('register-worker-form-id');

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
                data_contratacao: cells[5].innerText,
                num_agencia: cells[6].innerText
            };

            // Preenche o formulário com os dados da linha
            form.elements['id_funcionario'].value = rowData.id_funcionario;
            form.elements['id_funcionario'].disabled = true;
            form.elements['nome'].value = rowData.nome;
            form.elements['sobrenome'].value = rowData.sobrenome;
            form.elements['cargo'].value = rowData.cargo;
            form.elements['salario'].value = rowData.salario;
            form.elements['data_contratacao'].value = rowData.data_contratacao;
            form.elements['num_agencia'].value = rowData.num_agencia;
            document.getElementById("submit-btn-id").value = "Atualizar";
            document.getElementById("operation-id").value = "atualizar";
            document.getElementById("register-worker-title-id").style.display = "none";
            document.getElementById("update-worker-title-id").style.display = "block";
        }
    });

    document.getElementById("submit-btn-id").addEventListener('click', function () {
        document.getElementById("id_funcionario").value = "";
        document.getElementById("id_funcionario").disabled = false;
        document.getElementById("nome").value = "";
        document.getElementById("sobrenome").value = "";
        document.getElementById("cargo").value = "";
        document.getElementById("salario").value = "";
        document.getElementById("data_contratacao").value = "";
        document.getElementById("num_agencia").value = "";
        document.getElementById("submit-btn-id").value = "Enviar";
        document.getElementById("register-worker-title-id").style.display = "block";
        document.getElementById("update-worker-title-id").style.display = "none";
        if (!form.elements['id_funcionario'].value) {
            document.getElementById("operation-id").value = "cadastrar";
        }
    });

});

