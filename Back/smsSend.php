<?php
// Carrega a biblioteca do Twilio
require_once 'vendor\autoload.php';
use Twilio\Rest\Client;

// Dados da conta Twilio
$sid = 'AC87e5baf8cf38eaca3e4385ecf2bb4b4b';
$token = '2cb2048a33baf610311d01e646b3196c';

// Inicializa o objeto cliente do Twilio
$client = new Client($sid, $token);

// Envia a mensagem de texto
$message = $client->messages->create(
  '+5521969232991', // Número de telefone do destinatário
  array(
    'from' => '+5521969232991', // Número de telefone do remetente
    'body' => 'Teste de envio de mensagem com PHP' // Corpo da mensagem
  )
);

// Exibe a mensagem de sucesso ou erro
if ($message->sid) {
  echo   "Mensagem enviada com sucesso!";
} else {
  echo "Erro ao enviar mensagem: " . $message->errorMessage;
}
?>
