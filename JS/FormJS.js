// Função para validar um endereço de email
function validateEmail(email) {
    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
    if (reg.test(email)) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {
    // Seleciona o formulário com a classe 'formulario'
    $('form.formulario').submit(function (e) {
        // Evita o comportamento padrão do formulário de recarregar a página
        e.preventDefault();

        // Obtém o valor do campo de email
        var email = $('#email').val();

        // Valida o email
        if (!validateEmail(email)) {
            alert('Email incorreto');
            return;
        }

        // Cria um objeto FormData com os dados do formulário
        var formData = new FormData(this);

        // Envia a requisição Ajax para o servidor
        $.ajax({
            url: "Back/Form.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                // Exibe uma mensagem de sucesso ao usuário
                setTimeout(function () {
                    $('#mensagem-retorno').removeClass('error').addClass('success').text('Obrigado pela confiança!, responderei o mais rapido possível');
                },100); // 10000 milissegundos = 10 segundos


                // Limpa o formulário
                $('form.formulario')[0].reset();
            },
            error: function (xhr, status, error) {
                // Exibe uma mensagem de erro caso a requisição falhe
                $('#mensagem-retorno').removeClass('success').addClass('error').text('Ocorreu um erro: ');
                 console.log(error);
            }
        });
    });
});