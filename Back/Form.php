<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
  
    // Cria uma string com os dados do formulário
    $marcacao = "-----------------------------------------------------------------------
  Nome: $nome\n Sobrenome: $sobrenome \n Email: $email \n Mensagem: $mensagem\n
  ---------------------------------------------------------------------------------";
  
    // Escreve no arquivo
    if (file_put_contents('dados.txt', $marcacao)) {
      // Encaminha um JSON com a resposta para o AJAX caso não tenha recebido os dados
      $response = array(
        'success'=>true,
        'message'=>'Mensagem enviada!'
      );
      echo json_encode($response);
    } else {
      // Encaminha um JSON com a resposta para o AJAX caso não tenha recebido os dados
      $response = array(
        'success'=>false,
        'message'=>'Erro ao enviar a mensagem!'
      );
      echo json_encode($response);
    }
  }
  
?>