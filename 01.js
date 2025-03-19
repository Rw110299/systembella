document.getElementById("agendamentoForm").addEventListener("submit", function (event) {
    event.preventDefault();

    // Obter valores do formulário
    const nome = document.getElementById("nome").value;
    const servico = document.getElementById("servico").value;
    const data = document.getElementById("data").value;

    // Validar se os campos estão preenchidos
    if (!nome || !servico || !data) {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    // Mostrar uma mensagem de confirmação
    const mensagem = Obrigado, ${nome}! Seu agendamento para ${servico} foi confirmado para ${new Date(data).toLocaleString()}.;
    document.getElementById("mensagem").innerText = mensagem;

    // Limpar o formulário
    document.getElementById("agendamentoForm").reset();
});